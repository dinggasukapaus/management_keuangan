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
        return view('dashboard');
    });

    //manajemen sumber pemasukan

    Route::get('sumber-pemasukan', 'SumberController@index');
    Route::get('sumber-pemasukan/add', 'SumberController@add');
    Route::post('sumber-pemasukan/add', 'SumberController@store');
    Route::get('sumber-pemasukan/{id}', 'SumberController@edit');
    Route::put('sumber-pemasukan/{id}', 'SumberController@update');
    Route::delete('sumber-pemasukan/{id}', 'SumberController@delete');
    //manajemen pemasukan
    Route::get('pemasukan', 'PemasukanController@index');
    Route::get('pemasukan/yajra', 'PemasukanController@yajra');
    Route::get('pemasukan/add', 'PemasukanController@add');
    Route::post('pemasukan/add', 'PemasukanController@store');
    Route::get('pemasukan/{id}', 'PemasukanController@edit');
    Route::put('pemasukan/{id}', 'PemasukanController@update');
    Route::delete('pemasukan/{id}', 'PemasukanController@delete');

    //manajemen pengeluaran
    Route::get('pengeluaran','PengeluaranController@index');
    Route::get('pengeluaran/add','PengeluaranController@add');
    Route::post('pengeluaran/add','PengeluaranController@store');
    Route::get('pengeluaran/{id}','PengeluaranController@edit');
    Route::put('pengeluaran/{id}','PengeluaranController@update');
    Route::delete('pengeluaran/{id}','PengeluaranController@delete');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
