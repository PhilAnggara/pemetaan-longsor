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

Route::get('/', 'MainController@index')
    ->name('home');

Route::prefix('admin')
->middleware(['auth','only-admin'])
->group(function() {
    
    Route::get('/', 'MainController@dashboard')->name('dashboard');
    Route::get('/data-daerah-rawan', 'MainController@data')->name('data');

});
Auth::routes();
