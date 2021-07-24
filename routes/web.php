<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    /*----------------------------------------------
        Frontend route are here
    |-----------------------------------------------*/
    Route::get('/', 'App\Http\Controllers\Frontend\HomeController@index')->name('index');
    /*----------------------------------------------
        Login and Logout route are here
    |-----------------------------------------------*/
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/login/submit', 'App\Http\Controllers\Auth\LoginController@login')->name('login.submit');

    //Logout Route are here
    Route::post('/logout/user', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout.user');
    /*----------------------------------------------
        Frontend Dashboard route are here
    |-----------------------------------------------*/
        Route::get('courses/', 'App\Http\Controllers\Frontend\CourseController@course_show')->name('courses');
        Route::get('courses/{id}/', 'App\Http\Controllers\Frontend\CourseController@course_details')->name('course.details');
        Route::get('teacher/', 'App\Http\Controllers\Frontend\CourseController@teacher')->name('teacher');
        Route::get('contact/', 'App\Http\Controllers\Frontend\CourseController@contact')->name('contact');


    Route::group(['prefix' => 'user'], function(){
		Route::get('/token/{token}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('user.verification');
        Route::get('dashboard/', 'App\Http\Controllers\Frontend\DashboardController@index')->name('dashboard');
        Route::get('profile/', 'App\Http\Controllers\Frontend\DashboardController@profile')->name('user.profile');
        Route::get('dashboard/contant/{id}', 'App\Http\Controllers\Frontend\DashboardController@contant')->name('user.contant');

    });
    //Carts Route are here
    Route::group(['prefix' => 'carts'], function(){
        Route::get('/', 'App\Http\Controllers\Frontend\CartController@index')->name('carts');
        Route::post('/store', 'App\Http\Controllers\Frontend\CartController@store')->name('carts.store');
        Route::post('/update/{id}', 'App\Http\Controllers\Frontend\CartController@update')->name('carts.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Frontend\CartController@destroy')->name('carts.delete');
    });
    //checkouts route are here
    Route::group(['prefix' => 'checkouts'], function(){
        Route::get('/', 'App\Http\Controllers\Frontend\CheckOutController@index')->name('checkouts');
        Route::post('/store', 'App\Http\Controllers\Frontend\CheckOutController@store')->name('checkouts.store');
    });


    /*-----------------------------------------------
        Backend route are here
    |-----------------------------------------------*/
Route::group(['prefix' => 'admin'], function(){
    /*----------------------------------------------
        Dashboard and Profile route are here
    |-----------------------------------------------*/
    Route::get('/', 'App\Http\Controllers\backend\DashboardController@index')->name('admin.dashboard');
    Route::get('/profile', 'App\Http\Controllers\backend\DashboardController@profile')->name('admin.profile');
    Route::get('/profile/update', 'App\Http\Controllers\backend\DashboardController@profile_update')->name('admin.profile.update');
    Route::post('/profile/updated/{id}', 'App\Http\Controllers\backend\DashboardController@profile_update_submit')->name('admin.profile.update.submit');
    /*----------------------------------------------
        Admin, Role and User route are here
    |-----------------------------------------------*/
    Route::resource('roles', 'App\Http\Controllers\backend\RolesController', ['names'=>'admin.roles']);
    Route::resource('admins', 'App\Http\Controllers\backend\AdminController', ['names'=>'admin.admins']);
    Route::resource('users', 'App\Http\Controllers\backend\UserController', ['names'=>'admin.users']);
    /*----------------------------------------------
        Course & Content route are here
    |-----------------------------------------------*/
    Route::resource('courses', 'App\Http\Controllers\backend\CourseController', ['names'=>'admin.course']);
    Route::resource('course-contents', 'App\Http\Controllers\backend\CourseContentController', ['names'=>'admin.course.content']);
    /*----------------------------------------------
        Company Info route are here
    |-----------------------------------------------*/
    Route::get('company-info','App\Http\Controllers\backend\CompanyinfoController@index')->name('admin.companyinfo.index');
    Route::get('company-info/{id}/edit','App\Http\Controllers\backend\CompanyinfoController@edit')->name('admin.companyinfo.edit');
    Route::post('company-info/{id}/update','App\Http\Controllers\backend\CompanyinfoController@update')->name('admin.companyinfo.update');
    /*----------------------------------------------
        Login and Logout route are here
    |-----------------------------------------------*/
    Route::get('/login', 'App\Http\Controllers\backend\Auth\LoginController@showLoginForm')->name('admin.login');
    //Route::get('/survey/login/', 'App\Http\Controllers\backend\Auth\LoginController@showSurveyLoginForm')->name('admin.survey.login');
    Route::post('/login/submit', 'App\Http\Controllers\backend\Auth\LoginController@login')->name('admin.login.submit');

    //Logout Route are here
    Route::post('/logout/submit', 'App\Http\Controllers\backend\Auth\LoginController@logout')->name('admin.logout.submit');

    //Forget password Route are here
    //Route::get('/password/reset', 'backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    //Route::post('/password/reset/submit', 'backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
