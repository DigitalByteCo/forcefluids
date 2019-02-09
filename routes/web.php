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
	
	Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
		Route::resource('company', 'CompanyController', ['except' => ['destroy', 'show']]);	
	});


	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/generate-pdf', 'HomeController@pdf')->name('pdf');
	Route::get('/product', 'HomeController@product')->name('product');
	Route::post('/mail-pdf', 'HomeController@mailPdf')->name('mail.pdf');
	Route::get('/', 'HomeController@index');



});
