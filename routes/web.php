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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [
//    'uses' => 'HomeController@getIndex'
//]);

Route::get('/', [
    'uses' => 'TshirtController@getAllTshirt'
]);
Route::get('/sort', [
    'uses' => 'TshirtController@getSortTshirts',
	
]);

Route::get('/one/{tshirt_id?}', [
	'as' => 'one',
	'uses' => 'TshirtController@getOneTshirt',
]);

Route::post('/admin/create', [
	'uses' => 'TshirtController@postAddTshirt'
]);
