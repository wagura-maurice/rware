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

Route::get('/{id}/preview', 'CampaignController@preview')->name('campaign.preview');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/campaign', 'CampaignController');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
});

require __DIR__ . '/auth.php';
