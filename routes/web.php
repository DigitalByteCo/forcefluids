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
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('auth.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::namespace('Admin')->group(function () {
		Route::resource('company', 'CompanyController', ['except' => ['destroy', 'show']])->middleware('check.admin');
		Route::resource('customer', 'CustomerController', ['only' => ['index', 'create', 'store']])->middleware('check.admin');

		Route::resource('job', 'JobController', ['except' => ['destroy']]);
		Route::get('job/{job}/pdf', 'JobController@getJobPdf')->name('job.pdf');
		Route::get('job/additive', 'JobController@additive')->name('additive');
		Route::get('/job-revenue', 'JobController@getClosedJob')->name('job-revenue.index')->middleware('check.job-revenue');

		Route::resource('event', 'EventController', ['only' => ['create', 'store']])->middleware('check.event');

		Route::resource('job.revenue', 'JobRevenueController', ['only' => ['create', 'store']])->middleware('check.job');

		Route::resource('sales-order', 'PdfController', ['only' => ['index', 'create', 'store', 'show']]);
		Route::get('sales-order/{order}/download', 'PdfController@download')->name('sales-order.download');

		Route::post('sales-order/mail', 'PdfController@sendMail')->name('mail.pdf');
	});
	Route::get('/change-password', 'HomeController@getChangePassword')->name('get.change-pass');
	Route::post('/change-password', 'HomeController@postChangePassword')->name('post.change-pass');
	Route::get('/product', 'HomeController@product')->name('product');
	Route::get('/', 'HomeController@index')->name('home');
});
Route::get('/company-list', 'Admin\CompanyController@index')->name('company.ajax');
