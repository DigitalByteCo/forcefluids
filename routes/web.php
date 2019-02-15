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
		Route::resource('company', 'CompanyController', ['except' => ['destroy', 'show']])->middleware('check.admin');
		Route::resource('customer', 'CustomerController', ['only' => ['index', 'create', 'store']])->middleware('check.admin');

		Route::resource('job', 'JobController', ['except' => ['destroy']])->middleware('check.customer');
		Route::get('job/{job}/pdf', 'JobController@getJobPdf')->name('job.pdf')->middleware('check.customer');
		Route::resource('event', 'EventController', ['only' => ['create', 'store']])->middleware('check.customer');

		Route::resource('pdf', 'PdfController', ['only' => ['create', 'store']]);
		Route::post('pdf/mail', 'PdfController@sendMail')->name('mail.pdf');
	});
	Route::get('/change-password', 'HomeController@getChangePassword')->name('get.change-pass');
	Route::post('/change-password', 'HomeController@postChangePassword')->name('post.change-pass');
	Route::get('/product', 'HomeController@product')->name('product');
	Route::get('/', 'HomeController@index')->name('home');
});
