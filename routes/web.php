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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('auth/activate','Auth\ActivationController@activate')->name('auth.activate');
Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend','Auth\ActivationResendController@resend');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');



Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/unverified', 'AdminController@unverified')->name('admin.unverified');
    Route::get('/user-manage', 'AdminController@userManage')->name('admin.user-manage');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/unverified/updatestatus/{id}','AdminController@updateStatus');});

