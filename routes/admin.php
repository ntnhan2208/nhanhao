<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('admin')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login')->name('admin.login.submit');
    Route::group(['middleware' => ['auth:admin','2fa']], function () {
        Route::post('/2fa', function () {
            return redirect(URL()->previous());
        })->name('2fa')->middleware('2fa');
        Route::group(['middleware' => 'locale'], function() {
            Route::get('/', 'HomeController@index');
            Route::get('/home', 'HomeController@index')->name('dashboard');
            Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('admin.change-language');
            Route::post('/logout', 'AuthController@logout')->name('admin.logout');
            Route::resource('/languages', 'LanguageController');
            Route::get('change_profile', 'AdminController@changeProfile')->name('change_profile');
            Route::get('change_password', 'AdminController@changePassword')->name('change_password');
            Route::post('update_password', 'AdminController@updatePassword')->name('update_password');
            Route::resource('/admins', 'AdminController');
            Route::group(['prefix' => 'admins'], function (){
                Route::post('enable_2fa', 'AdminController@enable2fa')->name('admins.enable_2fa');
                Route::post('complete_2fa', 'AdminController@complete2fa')->name('admins.complete_2fa');
                Route::get('disable_2fa/{adminId}', 'AdminController@disable2fa')->name('admins.disable_2fa');
                Route::get('reset_2fa/{adminId}', 'AdminController@reset2fa')->name('admins.reset_2fa');
            });
            Route::resource('/role', 'RoleController');
            Route::resource('/permission', 'PermissionController');
        });
        Route::get('log','ActivitylogController@index')->name('activitylog.index');
        Route::get('data-log','ActivitylogController@data')->name('activitylog.data');
        Route::get('/clear-cache', function() {
            Artisan::call('cache:clear');
            return redirect()->route('dashboard');
        });
    });
});
