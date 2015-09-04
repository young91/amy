<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['domain' => 'yyf.focusgirls.cn', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
		Route::get('dashboard', 'DashBoardController@index');
	 	Route::get('admin', 'AdminController@index');
	 	Route::get('user', 'UserController@index');
	 	Route::get('user/add', 'UserController@add');
	 	Route::post('user/add', 'UserController@postAddUser');
	 	Route::post('user/updateWeight', 'UserController@postupdateWeight');
	 	Route::post('user/updateVip', 'UserController@postupdateVip');

	 	Route::get('user/updateService/{uid}', 'UserController@getUserService');
	 	Route::post('user/updateService', 'UserController@postupdateService');

	 	Route::get('user/userDetail/{uid}', 'UserController@getUserDetail');

		Route::get('/', 'DashBoardController@index');
});

Route::group(['domain' => 'www.focusgirls.cn'], function() {
		Route::get('/', 'WelcomeController@index');
		Route::get('home', 'HomeController@index');
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');
