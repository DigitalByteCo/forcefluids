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

// Route::get('/', '');
Auth::routes();

Route::get('/cache', 'HomeController@cache');
Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/generate-pdf', 'HomeController@pdf')->name('pdf');
	Route::get('/', 'HomeController@index');
});