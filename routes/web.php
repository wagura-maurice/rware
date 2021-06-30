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
    return redirect(route('login'));
});

// Lipa na Mpesa Online Transactions
Route::post('lnmo', 'LnmoController@lnmo')->name('lnmo');
Route::post('lnmo/callback', 'LnmoController@lnmoCallback')->name('lnmo.callback');
Route::post('lnmo/query', 'LnmoController@lnmoQuery')->name('lnmo.query');

Route::group(['middleware' => ['auth']], function () {
    // Applications Dashboard and other auth routes.
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::resource('/certification/types', 'CertificationTypeController')->middleware('can:Admin');
    Route::resource('/certification/categories', 'CertificationCategoryController');
    Route::resource('/certification/applications', 'ApplicationController');

    // Tenant Client Routes
    
});

require __DIR__ . '/auth.php';
