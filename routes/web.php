<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'isadmin'], function () {
	Route::get('/admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
	});

Route::post('/dispatch/add_email', [
	'uses' => 'DispatchController@PostEmailForDispatch'
]);

Route::get('/contact-us', [
	'uses' => 'HomeController@getContactUs'
]);

Route::get('/customer', [
	'uses' => 'HomeController@getCustomer'
]);

Route::get('/privacy-policy', [
	'uses' => 'HomeController@getPrivacy'
]);

Route::get('/return--policy', [
	'uses' => 'HomeController@getReturn'
]);

Route::get('/reviews', [
	'uses' => 'ReviewsController@getAllReviews'
]);

Route::post('/review/add', [
	'uses' => 'ReviewsController@postAddReview'
]);




Route::get('/', [
    'uses' => 'HomeController@getIndex'
]);



Route::get('/{university}/main', [
    'uses' => 'MainPageUniwearAndArticlesController@getIndexUniwearWithArticle'
]);

Route::get('/{university}/article/{article_id?}', [
	'as' => 'one',
	'uses' => 'MainPageUniwearAndArticlesController@getOneArticle',
]);




Route::post('/cart', [
	'uses' => 'CartController@postAdd'
]);
Route::get('/cart', [
	'uses' => 'CartController@getAdd'
]);

Route::get('/checkout/chandeotd', [
	'uses' => 'CartController@chandeOtdNvPost'
]);

Route::post('/cart/remove', [
	'uses' => 'CartController@postRemove'
]);

Route::get('/cart/checkout', [
	'uses' => 'CartController@getCheckout'
]);

Route::post('/cart/add', [
	'uses' => 'CartController@postAddCart'
]);

Route::get('/cart/complete', [
	'uses' => 'CartController@getShoppingComplete',
	'as' => 'complete_shop'
]);




Route::get('/order/{cart_id?}', [
	'uses' => 'CartController@getOrderForAdmin',

]);




							// ALL FOR CATALOG
//Route for cataloge
Route::get('/{university}/all/{size_id?}' , [
	'uses' => 'CatalogeController@getAllCataloge',
	'as' => 'Filter_KPI'
]);

Route::get('/{university}/tshirt/{size_id?}' , [
	'uses' => 'CatalogeController@getAllTshirt',
	'as' => 'Tshirts_KPI'
]);

Route::get('/{university}/polo/{size_id?}' , [
	'uses' => 'CatalogeController@getAllPolo',
	'as' => 'Polo_KPI'
]);

Route::get('/{university}/hoodie/{size_id?}' , [
	'uses' => 'CatalogeController@getAllHoodie',
	'as' => 'Hoodie_KPI'
]);

Route::get('/{university}/sweatshirt/{size_id?}' , [
	'uses' => 'CatalogeController@getAllSweatshirt',
	'as' => 'Sweatshirts_KPI'
]);

Route::get('/{university}/bomber/{size_id?}' , [
	'uses' => 'CatalogeController@getAllBombers',
	'as' => 'Bombers_KPI'
]);

//Route for one
Route::get('{university}/tshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('{university}/polo/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);
Route::get('{university}/sweatshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('{university}/hoodie/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('{university}/bomber/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);




									//All For KNU



//							Авторизация/Регистрация

// Вызов страницы регистрации пользователя
Route::get('register', 'AuthController@register');

// Пользователь заполнил форму регистрации и отправил
Route::post('register', 'AuthController@registerProcess');

// Пользователь получил письмо для активации аккаунта со ссылкой сюда
Route::get('activate/{id}/{code}', 'AuthController@activate');

// Вызов страницы авторизации
Route::get('login', 'AuthController@login');

// Пользователь заполнил форму авторизации и отправил
Route::post('login', 'AuthController@loginProcess');

// Выход пользователя из системы
Route::get('logout', 'AuthController@logoutuser');

// Пользователь забыл пароль и запросил сброс пароля. Это начало процесса -
// Страница с запросом E-Mail пользователя
Route::get('reset', 'AuthController@resetOrder');

// Пользователь заполнил и отправил форму с E-Mail в запросе на сброс пароля
Route::post('reset', 'AuthController@resetOrderProcess');

// Пользователю пришло письмо со ссылкой на эту страницу для ввода нового пароля
Route::get('reset/{id}/{code}', 'AuthController@resetComplete');

// Пользователь ввел новый пароль и отправил.
Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');

// Сервисная страничка, показываем после заполнения рег формы, формы сброса и т.
// о том, что письмо отправлено и надо заглянуть в почтовый ящик.
Route::get('wait', 'AuthController@wait');

// Пользователь получил письмо после регистрации в приложении для активации аккаунта со ссылкой
Route::get('activate_app/{id}/{code}', 'AuthController@activateForAppUser');

//Авторизация через соцсети
Route::get('signin', 'AuthController@signin');

//Коллбэк после авторизации через соцсети
Route::get('callback', 'AuthController@callbackSignin');