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

Route::get('/cart/complete', [
	'uses' => 'CartController@getShoppingComplete',
	'as' => 'complete_shop'
]);




Route::get('/order/{cart_id?}', [
	'uses' => 'CartController@getOrderForAdmin',

]);




							// ALL FOR KPI
//Route for cataloge
Route::get('/kpi/all/{size_id?}' , [
	'uses' => 'CatalogeController@getAllCataloge',
	'as' => 'Filter_KPI'
]);

Route::get('/kpi/tshirt/{size_id?}' , [
	'uses' => 'CatalogeController@getAllTshirt',
	'as' => 'Tshirts_KPI'
]);

Route::get('/kpi/polo/{size_id?}' , [
	'uses' => 'CatalogeController@getAllPolo',
	'as' => 'Polo_KPI'
]);

Route::get('/kpi/hoodie/{size_id?}' , [
	'uses' => 'CatalogeController@getAllHoodie',
	'as' => 'Hoodie_KPI'
]);

Route::get('/kpi/sweatshirt/{size_id?}' , [
	'uses' => 'CatalogeController@getAllSweatshirt',
	'as' => 'Sweatshirts_KPI'
]);

Route::get('/kpi/bomber/{size_id?}' , [
	'uses' => 'CatalogeController@getAllBombers',
	'as' => 'Bombers_KPI'
]);

//Route for one
Route::get('kpi/tshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('kpi/polo/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);
Route::get('kpi/sweatshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('kpi/hoodie/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('kpi/bomber/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);




									//All For KNU
//Route for catalog
Route::get('/knu/tshirt/{size_id?}' , [
	'uses' => 'CatalogeController@getAllTshirt',
	'as' => 'Tshirts_KNU'
]);

Route::get('/knu/polo/{size_id?}' , [
	'uses' => 'CatalogeController@getAllPolo',
	'as' => 'Polo_KNU'
]);

Route::get('/knu/hoodie/{size_id?}' , [
	'uses' => 'CatalogeController@getAllHoodie',
	'as' => 'Hoodie_KNU'
]);

Route::get('/knu/sweatshirt/{size_id?}' , [
	'uses' => 'CatalogeController@getAllSweatshirt',
	'as' => 'Sweatshirts_KNU'
]);

Route::get('/knu/bomber/{size_id?}' , [
	'uses' => 'CatalogeController@getAllBombers',
	'as' => 'Bombers_KNU'
]);

//Route for one
Route::get('knu/tshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('knu/polo/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);
Route::get('knu/sweatshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('knu/hoodie/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('knu/bomber/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);




										//All For KNEU
//Route For catalog
Route::get('/kneu/tshirt' , [
	'uses' => 'CatalogeController@getAllTshirt',
	'as' => 'Tshirts_KNEU'
]);

Route::get('/kneu/polo' , [
	'uses' => 'CatalogeController@getAllPolo',
	'as' => 'Polo_KNEU'
]);

Route::get('/kneu/hoodie' , [
	'uses' => 'CatalogeController@getAllHoodie',
	'as' => 'Hoodie_KNEU'
]);

Route::get('/kneu/sweatshirt' , [
	'uses' => 'CatalogeController@getAllSweatshirt',
	'as' => 'Sweatshirts_KNEU'
]);

Route::get('/kneu/bomber' , [
	'uses' => 'CatalogeController@getAllBombers',
	'as' => 'Bombers_KNEU'
]);

//Route for one
Route::get('kneu/tshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('kneu/polo/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);
Route::get('kneu/sweatshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('kneu/hoodie/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('kneu/bomber/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);



										//All for NMU
//Route for catalog
Route::get('/nmu/tshirt/' , [
	'uses' => 'CatalogeController@getAllTshirt',
	'as' => 'Tshirts_NMU'
]);

Route::get('/nmu/polo' , [
	'uses' => 'CatalogeController@getAllPolo',
	'as' => 'Polo_NMU'
]);

Route::get('/nmu/hoodie' , [
	'uses' => 'CatalogeController@getAllHoodie',
	'as' => 'Hoodie_NMU'
]);

Route::get('/nmu/sweatshirt' , [
	'uses' => 'CatalogeController@getAllSweatshirt',
	'as' => 'Sweatshirts_NMU'
]);

Route::get('/nmu/bomber' , [
	'uses' => 'CatalogeController@getAllBombers',
	'as' => 'Bombers_NMU'
]);

//Route for one
Route::get('nmu/tshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('nmu/polo/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);
Route::get('nmu/sweatshirt/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('nmu/hoodie/one/{id?}', [
	'as' => 'one',
	'uses' => 'CatalogeController@OneItemCataloge',
]);

Route::get('nmu/bomber/one/{id?}', [
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