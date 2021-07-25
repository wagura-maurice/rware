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
    return view('welcome');
});

// Lipa na Mpesa Online Transactions
Route::post('lnmo/transaction', 'LnmoController@transaction')->name('lnmo.transaction');
Route::post('lnmo/callback', 'LnmoController@lnmoCallback')->name('lnmo.callback');
Route::post('lnmo/query', 'LnmoController@lnmoQuery')->name('lnmo.query');

Route::group(['middleware' => ['auth', 'verified']], function () {
    // Applications Dashboard and other auth routes.
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    // certification types routes
    Route::resource('/certification/types', 'CertificationTypeController')->middleware('can:certification_types_access');
    // certification categories routes
    Route::get('/certification/categories/index', 'CertificationCategoryController@index')->name('categories.index');
    Route::get('/certification/categories/create', 'CertificationCategoryController@create')->name('categories.create')->middleware('can:certification_categories_create');
    Route::post('/certification/categories/store', 'CertificationCategoryController@store')->name('categories.store')->middleware('can:certification_categories_create');
    Route::delete('/certification/categories/destroy/{category}', 'CertificationCategoryController@destroy')->name('categories.destroy')->middleware('can:certification_categories_access');
    // certification applications routes
    Route::get('/certification/applications/index', 'ApplicationController@index')->name('applications.index');
    Route::delete('/certification/applications/destroy/{application}', 'ApplicationController@destroy')->name('applications.destroy')->middleware('can:certification_applications_access');
    Route::get('/certification/applications/apply/create/{category}', 'ApplicationController@applyCreate')->name('applications.applyCreate');
    Route::post('/certification/applications/apply/store', 'ApplicationController@applyStore')->name('applications.applyStore');
    Route::get('/certification/applications/apply/payment/{application}', 'ApplicationController@applyPayment')->name('applications.applyPayment');
    Route::post('/certification/applications/apply/process/payment', 'ApplicationController@applyProcessPayment')->name('applications.applyProcessPayment');
    Route::get('/certification/applications/apply/print/{application}', 'ApplicationController@applyPrint')->name('applications.applyPrint');
    // businesses routes
    // Route::resource('/businesses', 'BusinessController');
    Route::get('/businesses/index', 'BusinessController@index')->name('businesses.index');
    Route::get('/businesses/create', 'BusinessController@create')->name('businesses.create');
    Route::post('/businesses/store', 'BusinessController@store')->name('businesses.store');
    Route::delete('/businesses/destroy/{business}', 'BusinessController@destroy')->name('businesses.destroy');
    // users management point
    Route::get('/users/index', 'UserController@index')->name('users.index')->middleware('can:user_management_access');
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('can:user_management_access');
    Route::post('/users/store', 'UserController@store')->name('users.store')->middleware('can:user_management_access');
    Route::get('/users/edit/{user}', 'UserController@edit')->name('users.edit')->middleware('can:user_management_access');
    Route::delete('/users/destroy/{user}', 'UserController@destroy')->name('users.destroy')->middleware('can:user_management_access');
});

require __DIR__ . '/auth.php';
