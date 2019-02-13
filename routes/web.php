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

Auth::routes();

Route::get('/cache', 'HomeController@cache');
Route::group(['middleware' => ['web', 'auth']], function () {
	Route::namespace('Admin')->group(function () {
		Route::resource('company', 'CompanyController', ['except' => ['destroy', 'show']]);
		Route::resource('job', 'JobController', ['except' => ['destroy', 'show']]);
		Route::resource('customer', 'CustomerController', ['only' => ['index', 'create', 'store']]);
		Route::resource('event', 'EventController', ['only' => ['create', 'store']]);
		Route::resource('pdf', 'PdfController', ['only' => ['create', 'store']]);
		Route::post('pdf/mail', 'PdfController@sendMail')->name('mail.pdf');
	});
	Route::get('/product', 'HomeController@product')->name('product');
	Route::get('/', 'Admin\PdfController@create');
});
