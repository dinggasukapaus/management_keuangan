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
    Route::get('/','SumberController@tampilanawal');


    //manajemen keuangan

    Route::get('sumber-pemasukan','SumberController@index');
    Route::get('sumber-pengeluaran/add','SumberController@addpengeluaran');
    Route::get('sumber-pemasukan/add','SumberController@add');
    Route::post('sumber-pemasukan/submit','SumberController@store')->name('createpemasukan');
    Route::post('sumber-pengeluaran/submit','SumberController@storepengeluaran')->name('createpengeluaran');
    Route::get('sumber-pemasukan/edit/{id}','SumberController@edit');
    Route::get('sumber-pengeluaran/edit/{id}','SumberController@editpengeluaran');
    Route::get('sumber-pemasukan/delete/{id}', 'SumberController@destroy');
    Route::get('sumber-pengeluaran/delete/{id}', 'SumberController@destroypengeluaran');
    Route::put('sumber-pemasukan/update/{id}','SumberController@update')->name('updatepemasukan');
});

//manajemen distributor

Route::get('distributor','DistributorController@index');
Route::get('distributor/add','DistributorController@create');
Route::post('distributor/submit','DistributorController@store')->name('createpemasukan');
Route::get('distributor/edit/{id}','DistributorController@edit');
Route::put('distributor/update/{id}','DistributorController@update')->name('updatepemasukan');
Route::get('distributor/delete/{id}', 'DistributorController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
