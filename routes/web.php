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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');

// resource方法遵循RESTful架构为用户资源生成路由，该方法接收两个参数，第一个参数是资源名称，第二个参数是控制器名称
Route::resource('users', 'UsersController');

// 登录页面
Route::get('login', 'SessionsController@create')->name('login');
// 登录
Route::post('login', 'SessionsController@store')->name('login');
// 退出
Route::delete('logout', 'SessionsController@destroy')->name('logout');
// 激活
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

// 重置密码邮箱发送页面
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// 发送邮件重置链接
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// 密码重置页面
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// 更新密码
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');