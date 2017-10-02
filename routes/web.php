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

Route::post('/cart', [
	'uses' => 'CartController@postAdd'
]);
Route::get('/cart', [
	'uses' => 'CartController@getAdd'
]);

Route::post('/cart/remove', [
	'uses' => 'CartController@postRemove'
]);

Route::get('/cataloge', [
    'uses' => 'TshirtController@getAllTshirt'
]);
Route::get('/sort', [
    'uses' => 'TshirtController@getSortTshirts',
	
]);

Route::get('kpi/one/{tshirt_id?}', [
	'as' => 'one',
	'uses' => 'TshirtController@getOneTshirt',
]);




Route::get('/kpi/tshirts' , [
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

Route::get('/kpi/sweatshirts' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_KPI'
]);

Route::get('/kneu/tshirts' , [
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

Route::get('/kneu/sweatshirts' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_KNEU'
]);

Route::get('/nmu/tshirts/' , [
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

Route::get('/nmu/sweatshirts' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_NMU'
]);

Route::get('/knu/tshirts/' , [
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

Route::get('/knu/sweatshirts' , [
	'uses' => 'SweatshirtController@getAllSweatshirt',
	'as' => 'Sweatshirts_KNU'
]);


