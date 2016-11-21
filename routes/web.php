<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


// Route::group(['domain' => 'notifier.com'], function(){


// Route::get('/home', 'HomeController@index');

// });

// Route::group(['domain' => '{user}.notifier.com'], function($user){
//   // Route::get('/test', function () {
//   //
//   //
//   //     return view('welcome');
//   // });
//
//   Route::get('/home', 'HomeController@index');
//
//   Route::get('/test', 'SubscriptionController@subscriptions');
//
//   Route::post('/store_notification/{id}', 'SubscriptionController@store');
//
//   Route::get('/add_service', 'ServiceController@create');
//   Route::post('/store_service', 'ServiceController@store');
//   Route::get('/show_service', 'ServiceController@show');
//
//   Route::get('/add_customer', 'CustomerController@create');
//   Route::post('/store_customer', 'CustomerController@store');
//   Route::get('/show_customer', 'CustomerController@show');
//
//   Route::get('/list_to_notify', 'SubscriptionController@list');
//
//   Route::post('/store_notification', 'SubscriptionController@store');
//
//   Route::get('/mail', 'SubscriptionController@sendNotification');
//
// });
Auth::routes();

Route::get('/', function () {
      return view('welcome');
  });


Route::get('/home', 'HomeController@index');

Route::get('/add_service', 'ServiceController@create');
Route::post('/store_service', 'ServiceController@store');
Route::get('/show_service', 'ServiceController@show');

Route::get('/add_customer', 'CustomerController@create');
Route::post('/store_customer', 'CustomerController@store');
Route::get('/show_customer', 'CustomerController@show');

Route::get('/list_to_notify', 'SubscriptionController@list');
Route::post('/store_notification/{id}', 'SubscriptionController@store');
Route::get('/mail', 'SubscriptionController@sendNotification');
