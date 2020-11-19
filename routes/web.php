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


//! membatasi akses route dasboard
//! jadi route '/' akan dibatasi oleh middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    //manajemen sumber pemasukan

    Route::get('sumber-pemasukan','SumberController@index');
    Route::get('sumber-pemasukan/add','SumberController@add');
    Route::post('sumber-pemasukan/add','SumberController@store');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
