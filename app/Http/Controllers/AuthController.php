<?php
namespace App\Http\Controllers;
use App\Repositories\AuthRepository;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use App\Http\Request\RegisterUsers;
use App\Http\Request\LoginUsers;
use App\Http\Request\ResetUser;
use App\Http\Request\ResetComplete;
use App\Http\Requests;


class AuthController extends Controller
{

	public function __construct(){
		$this->auth = new AuthRepository();
	}
	public $networks = ['vkontakte', 'facebook', 'google'];
	/**
	 * Show login page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function login()
	{
		return view('auth.login');
	}
	/**
	 * Show Register page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function register()
	{
		$email = Session::get('network_user') != '' ? Session::get('network_user')->getEmail() : '';
		return view('auth.register', ['email' => $email]);
	}
	/**
	 * Show wait page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function wait()
	{
		return view('auth.wait');
	}
	/**
	 * Process login users
	 *
	 * @param Request $request
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function loginProcess(LoginUsers $request)
	{
		$login = $this->auth->LoginProcess($request);
		return $login;

	}
	/**
	 * Process register user from site
	 *
	 * @param Request $request
	 * @return $this
	 */
	public function registerProcess(RegisterUsers $request)
	{
		$register = $this->auth->registerProcess($request);
		return $register;
	}
	/**
	 *  Activate user account by user id and activation code
	 *
	 * @param $id
	 * @param $code
	 * @return $this
	 */
	public function activate($id, $code)
	{
		$activate = $this->auth->activate($id, $code);
		return $activate;
	}
	/**
	 *  Activate user account by user id and activation code
	 *
	 * @param $id
	 * @param $code
	 * @return $this
	 */
	public function activateForAppUser($id, $code)
	{
		$activate = $this->auth->activateForAppUser($id, $code);
		return $activate;

	}
	/**
	 * Show form for begin process reset password
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function resetOrder()
	{
		return view('auth.reset_order');
	}
	/**
	 * Begin process reset password by email
	 *
	 * @param Request $request
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function resetOrderProcess(ResetUser $request)
	{
		$reset = $this->auth->resetOrderProcess($request);
		return $reset;
	}
	/**
	 * Show form for complete reset password
	 *
	 * @param $id
	 * @param $code
	 * @return mixed
	 */
	public function resetComplete($id, $code)
	{
		$user = $this->auth->resetComplete($id, $code);
		return view('auth.reset_complete', array('user'=> $user));
	}
	/**
	 * Complete reset password
	 *
	 * @param Request $request
	 * @param $id
	 * @param $code
	 * @return $this
	 */
	public function resetCompleteProcess(ResetComplete $request, $id, $code)
	{
		$reset = $this->auth->resetCompleteProcess($request, $id, $code);
		return $reset;
	}
	/**
	 * @return mixed
	 */
	public function logoutuser()
	{
		$logout = $this->auth->logoutuser();
		return $logout;
	}
	/**
	 * @return mixed
	 */
	public function signin()
	{
		$signin = $this->auth->signin();
		return $signin;
	}
	public function callbackSignin()
	{
		$callbackSign = $this->auth->callbackSignin();
		return $callbackSign;
	}
}