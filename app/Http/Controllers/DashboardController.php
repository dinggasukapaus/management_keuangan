<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $pegawai = DB::table('datapegawai')->get();
        $distributor = DB::table('datadistributor')->get();
        $produksi = DB::table('dataproduksi')->get();
        $pemasukan = DB::table('datapemasukan')->get()->sum('total_pemasukan');
        $pengeluaran = DB::table('datapengeluaran')->get()->sum('nominal_luar');

        return view('dashboard',compact('pegawai','distributor','produksi','pemasukan','pengeluaran'));
    }
}
