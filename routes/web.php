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


Route::get('/', [
    'uses' => 'HomeController@getIndex'
]);

Route::get('/kpi/main', [
    'uses' => 'MainPageUniwearAndArticlesController@getIndexUniwearWithArticle'
]);

Route::get('/nmu/main', [
    'uses' => 'MainPageUniwearAndArticlesController@getIndexUniwearWithArticle'
]);

Route::get('/knu/main', [
    'uses' => 'MainPageUniwearAndArticlesController@getIndexUniwearWithArticle'
]);

Route::get('kpi/article/{article_id?}', [
	'as' => 'one',
	'uses' => 'MainPageUniwearAndArticlesController@getOneArticle',
]);

Route::get('knu/article/{article_id?}', [
	'as' => 'one',
	'uses' => 'MainPageUniwearAndArticlesController@getOneArticle',
]);

Route::get('nmu/article/{article_id?}', [
	'as' => 'one',
	'uses' => 'MainPageUniwearAndArticlesController@getOneArticle',
]);


Route::post('/cart', [
	'uses' => 'CartController@postAdd'
]);
Route::get('/cart', [
	'uses' => 'CartController@getAdd'
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





							// ALL FOR KPI
//Route for cataloge
Route::get('/kpi/all' , [
	'uses' => 'FilterController@getAllCataloge',
	'as' => 'Filter_KPI'
]);

Route::get('/kpi/tshirt' , [
	'uses' => 'TshirtController@getAllTshirt',
	'as' => 'Tshirts_KPI'
]);

Route::get('/kpi/polo' , [
	'uses' => 'PoloController@getAllPolo',
	'as' => 'Polo_KPI'
]);

Route::get('/kpi/hoodie' , [
	'uses' => 'HoodieController@getAllHoodie',
	'as' => 'Hoodie_KPI'
]);

Route::get('/kpi/sweatshirt' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_KPI'
]);

Route::get('/kpi/bomber' , [
	'uses' => 'BomberController@getAllBombers',
	'as' => 'Bombers_KPI'
]);

//Route for one
Route::get('kpi/tshirt/one/{tshirt_id?}', [
	'as' => 'one',
	'uses' => 'TshirtController@getOneTshirt',
]);

Route::get('kpi/polo/one/{polo_id?}', [
	'as' => 'one',
	'uses' => 'PoloController@getOnePolo',
]);
Route::get('kpi/sweatshirt/one/{sweatshirt_id?}', [
	'as' => 'one',
	'uses' => 'SweatshirtController@getOneSweatshirt',
]);

Route::get('kpi/hoodie/one/{hoodie_id?}', [
	'as' => 'one',
	'uses' => 'HoodieController@getOneHoodie',
]);

Route::get('kpi/bomber/one/{bomber_id?}', [
	'as' => 'one',
	'uses' => 'BomberController@getOneBomber',
]);




									//All For KNU
//Route for catalog
Route::get('/knu/tshirt/' , [
	'uses' => 'TshirtController@getAllTshirt',
	'as' => 'Tshirts_KNU'
]);

Route::get('/knu/polo' , [
	'uses' => 'PoloController@getAllPolo',
	'as' => 'Polo_KNU'
]);

Route::get('/knu/hoodie' , [
	'uses' => 'HoodieController@getAllHoodie',
	'as' => 'Hoodie_KNU'
]);

Route::get('/knu/sweatshirt' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_KNU'
]);

Route::get('/knu/bomber' , [
	'uses' => 'BomberController@getAllBombers',
	'as' => 'Bombers_KNU'
]);

//Route for one
Route::get('knu/tshirt/one/{tshirt_id?}', [
	'as' => 'one',
	'uses' => 'TshirtController@getOneTshirt',
]);

Route::get('knu/polo/one/{polo_id?}', [
	'as' => 'one',
	'uses' => 'PoloController@getOnePolo',
]);
Route::get('knu/sweatshirt/one/{sweatshirt_id?}', [
	'as' => 'one',
	'uses' => 'SweatshirtController@getOneSweatshirt',
]);

Route::get('knu/hoodie/one/{hoodie_id?}', [
	'as' => 'one',
	'uses' => 'HoodieController@getOneHoodie',
]);

Route::get('knu/bomber/one/{bomber_id?}', [
	'as' => 'one',
	'uses' => 'BomberController@getOneBomber',
]);




										//All For KNEU
//Route For catalog
Route::get('/kneu/tshirt' , [
	'uses' => 'TshirtController@getAllTshirt',
	'as' => 'Tshirts_KNEU'
]);

Route::get('/kneu/polo' , [
	'uses' => 'PoloController@getAllPolo',
	'as' => 'Polo_KNEU'
]);

Route::get('/kneu/hoodie' , [
	'uses' => 'HoodieController@getAllHoodie',
	'as' => 'Hoodie_KNEU'
]);

Route::get('/kneu/sweatshirt' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_KNEU'
]);

Route::get('/kneu/bomber' , [
	'uses' => 'BomberController@getAllBombers',
	'as' => 'Bombers_KNEU'
]);

//Route for one
Route::get('kneu/tshirt/one/{tshirt_id?}', [
	'as' => 'one',
	'uses' => 'TshirtController@getOneTshirt',
]);

Route::get('kneu/polo/one/{polo_id?}', [
	'as' => 'one',
	'uses' => 'PoloController@getOnePolo',
]);
Route::get('kneu/sweatshirt/one/{sweatshirt_id?}', [
	'as' => 'one',
	'uses' => 'SweatshirtController@getOneSweatshirt',
]);

Route::get('kneu/hoodie/one/{hoodie_id?}', [
	'as' => 'one',
	'uses' => 'HoodieController@getOneHoodie',
]);

Route::get('kneu/bomber/one/{bomber_id?}', [
	'as' => 'one',
	'uses' => 'BomberController@getOneBomber',
]);



										//All for NMU
//Route for catalog
Route::get('/nmu/tshirt/' , [
	'uses' => 'TshirtController@getAllTshirt',
	'as' => 'Tshirts_NMU'
]);

Route::get('/nmu/polo' , [
	'uses' => 'PoloController@getAllPolo',
	'as' => 'Polo_NMU'
]);

Route::get('/nmu/hoodie' , [
	'uses' => 'HoodieController@getAllHoodie',
	'as' => 'Hoodie_NMU'
]);

Route::get('/nmu/sweatshirt' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_NMU'
]);

Route::get('/nmu/bomber' , [
	'uses' => 'BomberController@getAllBombers',
	'as' => 'Bombers_NMU'
]);

//Route for one
Route::get('nmu/tshirt/one/{tshirt_id?}', [
	'as' => 'one',
	'uses' => 'TshirtController@getOneTshirt',
]);

Route::get('nmu/polo/one/{polo_id?}', [
	'as' => 'one',
	'uses' => 'PoloController@getOnePolo',
]);
Route::get('nmu/sweatshirt/one/{sweatshirt_id?}', [
	'as' => 'one',
	'uses' => 'SweatshirtController@getOneSweatshirt',
]);

Route::get('nmu/hoodie/one/{hoodie_id?}', [
	'as' => 'one',
	'uses' => 'HoodieController@getOneHoodie',
]);

Route::get('nmu/bomber/one/{bomber_id?}', [
	'as' => 'one',
	'uses' => 'BomberController@getOneBomber',
]);



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