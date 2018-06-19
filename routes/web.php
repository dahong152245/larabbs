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

Route::get('/','PagesController@root')->name('root');

//----------------用户认证路由Auth::routes()---------------------------------------//
//Auth 用户认证路由当php artisan make:auth的时候会出现以下的路由
//Auth::routes();为了更方便理解,相当于以下的路由方式
//登录路由
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginCtroller@logout')->name('logout');
//注册路由
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register');
//密码重置
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//------------------------------------------------------------//

//创建个人页面资源控制器
Route::resource('users','UsersController',['only'=>['show','update','edit']]);
//以上的资源控制器,相当于以下的路由
//Route::get('/users/{user}','UsersController@show')->name('users.show');
//Route::get('/users/{user}/edit','UsersController@edit')->name('users.edit');
//Route::path('/users/{user}','UsersController@update')->name('users.update');

Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);