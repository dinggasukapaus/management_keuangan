<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){
        return view('laporan.laporan_index');
    }
    public function cari(Request $request){
        $this->validate($request,[
            'dari'=>'required',
            'sampai'=>'required'
        ]);

        $dari = date('Y-m-d',strtotime($request->dari));
        $sampai = date('Y-m-d',strtotime($request->sampai));

        $pemasukan = DB::table('datapemasukan as dp')
        ->join('datadistributor as dd','dp.sumber_pemasukan_id','=','dd.id')
        ->whereBetween('tanggal',[$dari,$sampai])->get();
        $pemasukan_total = DB::table('datapemasukan as dp')
        ->join('datadistributor as dd','dp.sumber_pemasukan_id','=','dd.id')
        ->whereBetween('tanggal',[$dari,$sampai])->sum('total_pemasukan');
        $pengeluaran = DB::table('datapengeluaran')->whereBetween('tanggal_pengeluaran',[$dari,$sampai])->get();

        return view('laporan.laporan_index',compact('pemasukan','pengeluaran','pemasukan_total'));
    }
}
