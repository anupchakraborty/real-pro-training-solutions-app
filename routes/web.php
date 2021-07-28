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
        Frontend pages route are here
    |-----------------------------------------------*/
    Route::post('/student/registation', 'App\Http\Controllers\Frontend\HomeController@registation')->name('student.registation');
    Route::get('about/', 'App\Http\Controllers\Frontend\HomeController@about')->name('about');
    Route::get('teacher/', 'App\Http\Controllers\Frontend\HomeController@teacher')->name('teacher');
    Route::get('contact/', 'App\Http\Controllers\Frontend\HomeController@contact')->name('contact');
    // Route::get('contact/email', 'App\Http\Controllers\HomeController@create');
    Route::post('contact/email', 'App\Http\Controllers\Frontend\\HomeController@sendEmail')->name('send.email');
    Route::get('courses/', 'App\Http\Controllers\Frontend\CourseController@course_show')->name('courses');
    Route::get('courses/{id}/', 'App\Http\Controllers\Frontend\CourseController@course_details')->name('course.details');

    /*----------------------------------------------
        Login and Logout route are here
    |-----------------------------------------------*/
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/login/submit', 'App\Http\Controllers\Auth\LoginController@login')->name('login.submit');
    
    //Logout Route are here
    Route::post('/logout/user', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout.user');

    //Dashboard route
    Route::group(['prefix' => 'user'], function(){
		Route::get('/token/{token}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('user.verification');
        Route::get('dashboard/', 'App\Http\Controllers\Frontend\DashboardController@index')->name('dashboard');
        Route::get('profile/', 'App\Http\Controllers\Frontend\DashboardController@profile')->name('user.profile');
        Route::get('dashboard/course/{course_id}', 'App\Http\Controllers\Frontend\DashboardController@course')->name('user.contant');
        Route::get('dashboard/course/content/{content_id}', 'App\Http\Controllers\Frontend\DashboardController@course_contant')->name('user.course.contant');
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
        Route::get('/thanks','App\Http\Controllers\Frontend\CheckoutController@thanks')->name('checkouts.thanks');
        Route::match(['get','post'],'/stripe','App\Http\Controllers\Frontend\CheckoutController@stripe')->name('checkout.stripe'); 
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
        About Section route are here
    |-----------------------------------------------*/
    Route::get('about-info','App\Http\Controllers\backend\AboutController@index')->name('admin.about.index');
    Route::get('about-info/{id}/edit','App\Http\Controllers\backend\AboutController@edit')->name('admin.about.edit');
    Route::post('about-info/{id}/update','App\Http\Controllers\backend\AboutController@update')->name('admin.about.update');
    /*----------------------------------------------
        Order route are here
    |-----------------------------------------------*/
    Route::resource('orders', 'App\Http\Controllers\backend\OrderController', ['names'=>'admin.orders']);
    //Invoice route are here
    Route::get('/invoice/{id}', 'App\Http\Controllers\backend\OrderController@invoice')->name('admin.order.invoice');
    Route::get('/geinvoice/{id}', 'App\Http\Controllers\backend\OrderController@generateinvoice')->name('admin.order.generateinvoice');
    //payment status
    Route::get('/paid/{id}', 'App\Http\Controllers\backend\OrderController@paid')->name('admin.order.paid');
    //order status
    Route::get('/completed/{id}', 'backend\OrderController@completed')->name('admin.order.completed');
    Route::get('/panding/{id}', 'backend\OrderController@panding')->name('admin.order.panding');
    /*----------------------------------------------
        Slider route are here
    |-----------------------------------------------*/
    Route::get('slider','App\Http\Controllers\backend\SliderController@index')->name('admin.sliders.index');
    Route::get('slider/{id}/edit','App\Http\Controllers\backend\SliderController@edit')->name('admin.sliders.edit');
    Route::post('slider/{id}/update','App\Http\Controllers\backend\SliderController@update')->name('admin.sliders.update');
    Route::post('slider/{id}/delete','App\Http\Controllers\backend\SliderController@destroy')->name('admin.sliders.destroy');
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
