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
Route::get('/', function () {
 return view('auth.login');
});

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');


//! membatasi akses route dasboard
Route::group(['middleware' => ['role:admin']], function () {


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

    //manajemen pegawai
    Route::get('pegawai','PegawaiController@index');
    Route::get('pegawai/add','PegawaiController@add');
    Route::post('pegawai/add','PegawaiController@store');
    Route::get('pegawai/{id}','PegawaiController@edit');
    Route::put('pegawai/{id}','PegawaiController@update');
    Route::delete('pegawai/{id}','PegawaiController@delete');

     //manajemen produksi
     Route::get('produksi','ProduksiController@index');
     Route::get('produksi/add','ProduksiController@add');
     Route::post('produksi/add','ProduksiController@store');
     Route::get('produksi/{id}','ProduksiController@edit');
     Route::put('produksi/{id}','ProduksiController@update');
     Route::delete('produksi/{id}','ProduksiController@delete');

     //manajemen pertemuan
     Route::get('pertemuan','PertemuanController@index');
     Route::get('pertemuan/add','PertemuanController@add');
     Route::post('pertemuan/add','PertemuanController@store');
     Route::get('pertemuan/{id}','PertemuanController@edit');
     Route::put('pertemuan/{id}','PertemuanController@update');
     Route::delete('pertemuan/{id}','PertemuanController@delete');

     Route::get('laporan','LaporanController@index');
     Route::get('laporan_cari','LaporanController@cari');
});

Route::group(['middleware' => ['role:user|admin']], function () {


    //list sumber pemasukan
    Route::get('sumber-pemasukan', 'SumberController@index');
    //list pemasukan
    Route::get('pemasukan', 'PemasukanController@index');
    Route::get('pemasukan/yajra', 'PemasukanController@yajra');
    //list pengeluaran
    Route::get('pengeluaran','PengeluaranController@index');
    //list pegawai
    Route::get('pegawai','PegawaiController@index');
    //list produksi
    Route::get('produksi','ProduksiController@index');
    //list pertemuan
    Route::get('pertemuan','PertemuanController@index');
    Route::get('pertemuan/add','PertemuanController@add');
    Route::post('pertemuan/add','PertemuanController@store');
    Route::get('pertemuan/{id}','PertemuanController@edit');
    Route::put('pertemuan/{id}','PertemuanController@update');
    Route::delete('pertemuan/{id}','PertemuanController@delete');

    Route::get('laporan','LaporanController@index');
    Route::get('laporan_cari','LaporanController@cari');

});




