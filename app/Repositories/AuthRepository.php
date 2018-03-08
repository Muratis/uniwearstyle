<?php
namespace App\Repositories;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Redirect;
use Sentinel;
use Activation;
use Reminder;
use Mail;
use Storage;
use CurlHttp;
use Illuminate\Support\Facades\Input;
use Socialite;
use Session;
use App\Models\Dispatch;

class AuthRepository
{

	public function registerProcess($data){

		if (isset($data->universities)) {
			$uniwears = $data->universities;
			foreach ($uniwears as $uniwear) {
				$university_dispatch = new Dispatch();
				$university_dispatch->email= $data->email;
				$university_dispatch->university= $uniwear;
				$university_dispatch->save();
			}
		}

		$input = $data->all();
		if (Session::get('network_user') && Session::get('network_user')->id) {
			$input[Session::get('network') . '_id'] = Session::get('network_user')->id;
		}

		$credentials = [
			'email' => $data->email,
			'first_name' => $data->first_name,
			'last_name' => $data->last_name
		];

		if($user = Sentinel::findByCredentials($credentials))
		{
			return Redirect::to('register')
				->withErrors('Такой Email уже зарегистрирован.');
		}
		if ($sentuser = Sentinel::register($input))
		{
			$activation = Activation::create($sentuser);
			$code = $activation->code;
			$sent = Mail::send('mail.account_activate', compact('sentuser', 'code'), function($m) use ($sentuser)
			{
				$m->from('UniwearStyle@gmail.com', 'UniwearStyle');
				$m->to($sentuser->email)->subject('Активация аккаунта');
			});
			if ($sent === 0)
			{
				return Redirect::to('register')
					->withErrors('Ошибка отправки письма активации.');
			}
			$role = Sentinel::findRoleBySlug('user');
			$role->users()->attach($sentuser);
			Session::forget('network_user');
			Session::forget('network');
			return Redirect::to('#modal-1')
				->withSuccess('Ваш аккаунт создан. Проверьте Email для активации.')
				->with('userId', $sentuser->getUserId());
		}
		return Redirect::to('register')
			->withInput()
			->withErrors('Помилка реєстрації, спробуйте пізніше.');


	}

	public function LoginProcess($data)
	{
		try
		{

			if (Sentinel::authenticate($data->all()))
			{
				if(Sentinel::inRole('admin')) return redirect('admin');
				return Redirect::intended('/');
			}
			$errors = 'Неправильный логин или пароль.';
			return Redirect::back()
				->withInput()
				->withErrors($errors);
		}
		catch (NotActivatedException $e)
		{
			$sentuser= $e->getUser();
			$activation = Activation::create($sentuser);
			$code = $activation->code;
			$sent = Mail::send('mail.account_activate', compact('sentuser', 'code'), function($m) use ($sentuser)
			{
				$m->from('noreplay@mysite.com', 'UniwearStyle.com');
				$m->to($sentuser->email)->subject('Активация аккаунта');
			});
			if ($sent === 0)
			{
				return Redirect::to('login')
					->withErrors('Ошибка отправки письма активации.');
			}
			$errors = 'Ваш аккаунт не ативирован! Поищите в своем почтовом ящике письмо со ссылкой для активации (Вам отправлено повторное письмо). ';
			return view('auth.login')->withErrors($errors);
		}
		catch (ThrottlingException $e)
		{
			$delay = $e->getDelay();
			$errors = "Ваш аккаунт блокирован на {$delay} секунд.";
		}
		return Redirect::back()
			->withInput()
			->withErrors($errors);
	}
	
	public function activate($id, $code)
	{
		$sentuser = Sentinel::findById($id);
		if ( ! Activation::complete($sentuser, $code))
		{
			return Redirect::to("login")
				->withErrors('Неверный или просроченный код активации.');
		}
		return Redirect::to('login')
			->withSuccess('Аккаунт активирован.');
	}

	public function activateForAppUser($id, $code)
	{
		$sentuser = Sentinel::findById($id);
		if ( ! Activation::complete($sentuser, $code))
		{
			return view('auth.activate_result', ['result' => 'Invalid or expired activation code.']);
		}
		Sentinel::update($sentuser, ['email_confirmed' => 1]);
		return view('auth.activate_result', ['result' => 'Account activated.']);
	}

	public function resetOrderProcess($data)
	{
		$email = $data->email;
		$sentuser = Sentinel::findByCredentials(compact('email'));
		if ( ! $sentuser)
		{
			return Redirect::back()
				->withInput()
				->withErrors('Пользователь с таким E-Mail в системе не найден.');
		}
		$reminder = Reminder::exists($sentuser) ?: Reminder::create($sentuser);
		$code = $reminder->code;
		$sent = Mail::send('mail.account_reminder', compact('sentuser', 'code'), function($m) use ($sentuser)
		{
			$m->from('noreplay@mysite.com', 'UniwearStyle.com');
			$m->to($sentuser->email)->subject('Сброс пароля');
		});
		if ($sent === 0)
		{
			return Redirect::to('reset')
				->withErrors('Ошибка отправки email.');
		}
		return Redirect::to('wait');
	}

	public function resetComplete($id, $code)
	{
		$user = Sentinel::findById($id);
		return $user;
	}

	public function resetCompleteProcess($data, $id, $code)
	{
		$user = Sentinel::findById($id);
		if (!$user)
		{
			return Redirect::back()
				->withInput()
				->withErrors('Такого пользователя не существует.');
		}
		if ( ! Reminder::complete($user, $code, $data->password))
		{
			return Redirect::to('login')
				->withErrors('Неверный или просроченный код сброса пароля.');
		}
		return Redirect::to('login')
			->withSuccess("Пароль сброшен.");
	}

	public function logoutuser()
	{
		Sentinel::logout();
		return Redirect::intended('/');
	}

	public function signin()
	{
		if (Input::get('network') && in_array(Input::get('network'), $this->networks)) {
			return Socialite::with(Input::get('network'))->redirect();
		}
	}

	public function callbackSignin()
	{
		//проверяем, есть ли параметр network, и присутствует ли он в массиве доступных соц. сетей
		if (Input::get('network') && in_array(Input::get('network'), $this->networks)) {
			//получили данные пользователя из соц. сети
			$network_user = Socialite::with(Input::get('network'))->stateless()->user();
			//проверяем, есть ли в полученных данных значение email
			if ($network_user->getEmail() != '') {
				//если email получен - проверяем, есть ли в системе пользователь с таким email
				$credentials = ['email' => $network_user->getEmail()];
				$user = Sentinel::findByCredentials($credentials);
				if (!$user) {
					//если нет в системе пользователя с таким email,
					//проверяем есть ли в системе пользователь с таким id в конкретной соцсети
					$credentials = [Input::get('network') . '_id' => $network_user->getId()];
					$user = Sentinel::findByCredentials($credentials);
				} else {
					//если есть в системе пользователь с таким email,
					//проверяем заполнен ли id сети
					if ($user[Input::get('network') . '_id'] == '') {
						$credentials = [Input::get('network') . '_id' => $network_user->getId()];
						$user = Sentinel::update($user, $credentials);
					}
				}
			} else {
				//в полученных данных нет email
				//проверяем есть ли в системе пользователь с таким id в конкретной соцсети
				$credentials = [Input::get('network') . '_id' => $network_user->getId()];
				$user = Sentinel::findByCredentials($credentials);
			}
			if (!$user) {
				//пользователь в системе не найден -
				//отправляем на страницу регистрации со всеми полученными из соц. сети данными
				Session::put('network_user', $network_user);
				Session::put('network', Input::get('network'));
				return Redirect::to('/register');
			} else {
				//если найден - логиним в систему и редиректим на главную
				if ($activation = Activation::completed($user)) {
					Sentinel::login($user);
					return Redirect::intended('/');
				} else {
					return Redirect::to('login')
						->withErrors('Ранее, на Вашу почту было отправлено письмо с дальнейшими инструкциями по активации аккаунта.');
				}
			}
		}
	}
}