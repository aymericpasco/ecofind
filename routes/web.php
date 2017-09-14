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

Route::get('/', 'HomeController@home');

//Auth::routes();

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

// Custom
Route::get('place/add', 'User\PlaceController@create');
Route::post('place/add', 'User\PlaceController@store');
Route::get('place/{slug?}/review/add', 'User\ReviewController@create');
Route::post('place/{slug?}/review/add', 'User\ReviewController@store');
//Route::get('place/{id?}/edit', 'User\PlaceController@edit');
//Route::post('place/{id?}/edit','User\PlaceController@update');

Route::get('places', 'SearchController@index');
Route::get('place/{slug?}', 'PlaceController@show');

//Route::get('place/{id?}/review/add', 'User\PlaceController@create');
//Route::post('place/{id?}/review/add', 'User\PlaceController@store');
//Route::get('place/{id?}/edit', 'User\PlaceController@edit');
//Route::post('place/{id?}/edit','User\PlaceController@update');
