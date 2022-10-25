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

Route::get('/', function () {
    // Redirect to home ---> if has auth redirect to home or go to login page
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::namespace('App\Http\Controllers')->middleware('auth')->group(function () {

    //************************************************
    //                  البروفايل
    //************************************************
    // عرض صفحة البروفايل
    route::get('profile', 'ProfileController@profil')->name('profile');
    // تعديل بيانات الروفايل
    route::post('profile', 'ProfileController@profile_store')->name('profile.store');

    //************************************************
    //               الاعدادات العامة
    //************************************************
    // عرض صفحة الاعدادات
    route::get('setting', 'SettingController@setting')->name('setting');
    // تعديل  الاعدادات
    route::post('setting', 'SettingController@setting_store')->name('setting.store');

    //************************************************
    //               الاعدادات العامة
    //************************************************

    route::resource('pharma', 'PharmaController')->middleware('admin');
    route::resource('pharmacy', 'PharmacyController')->middleware('pharma');
    route::resource('medicine', 'MedicineController')->middleware('pharma');
    route::resource('order', 'OrderController')->middleware('pharma');
    route::get('/acceptable', 'OrderController@acceptable')->name('acceptable')->middleware('pharma');
    route::get('/rejected', 'OrderController@rejected')->name('rejected')->middleware('pharma');

    route::get('acceptable/{id}', 'OrderController@order_Acceptance')->name('order.Acceptance')->middleware('pharma');
    route::get('rejected/{id}', 'OrderController@order_reject')->name('order.reject')->middleware('pharma');

    route::get('report/pharma', 'ReportController@report_pharma')->name('report.pharma')->middleware('admin');
    route::get('report/medicine', 'ReportController@report_medicine')->name('report.medicine')->middleware('pharma');
});
