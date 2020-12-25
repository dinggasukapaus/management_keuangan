<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;

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
        $pengeluaran = DB::table('datapengeluaran')
        ->whereBetween('tanggal_pengeluaran',[$dari,$sampai])->get();
        $pengeluaran_total = DB::table('datapengeluaran')
        ->whereBetween('tanggal_pengeluaran',[$dari,$sampai])->sum('nominal_luar');



        return view('laporan.laporan_index',
        compact('pemasukan','pengeluaran',
        'pemasukan_total','pengeluaran_total',
        'dari','sampai'
    ));
    }

    public function export_pemasukan($dari,$sampai){


        $title = 'laporan pemasukan';
        $pemasukan = DB::table('datapemasukan as dp')
        ->join('datadistributor as dd','dp.sumber_pemasukan_id','=','dd.id')
        ->whereBetween('tanggal',[$dari,$sampai])->get();
        $pemasukan_total = DB::table('datapemasukan as dp')
        ->join('datadistributor as dd','dp.sumber_pemasukan_id','=','dd.id')
        ->whereBetween('tanggal',[$dari,$sampai])->sum('total_pemasukan');

        // if($pemasukan_total>=$pengeluaran_total){
        //     $laba=$pemasukan_total -$pengeluaran_total;
        // }elseif ($pemasukan_total<=$pengeluaran_total){
        //     $laba=0;
        // }else{
        //     $laba=0;
        // }


        Excel::create($title, function($excel) use($pemasukan,$pemasukan_total) {
            $excel->sheet('Sheetname', function($sheet) use($pemasukan,$pemasukan_total) {

                $sheet->loadView('laporan.laporan_pemasukan_excel')->with('pemasukan',$pemasukan)
                ->with('pemasukan_total',$pemasukan_total);

            });
        })->export('xls');
    }

    public function export_pengeluaran($dari,$sampai){
        $title = 'laporan pengeluaran';
        $pengeluaran = DB::table('datapengeluaran')
        ->whereBetween('tanggal_pengeluaran',[$dari,$sampai])->get();
        $pengeluaran_total = DB::table('datapengeluaran')
        ->whereBetween('tanggal_pengeluaran',[$dari,$sampai])->sum('nominal_luar');

        // if($pemasukan_total>=$pengeluaran_total){
        //     $laba=$pemasukan_total -$pengeluaran_total;
        // }elseif ($pemasukan_total<=$pengeluaran_total){
        //     $laba=0;
        // }else{
        //     $laba=0;
        // }


        Excel::create($title, function($excel) use($pengeluaran,$pengeluaran_total) {
            $excel->sheet('Sheetname', function($sheet) use($pengeluaran,$pengeluaran_total) {

                $sheet->loadView('laporan.laporan_pengeluaran_excel')->with('pengeluaran',$pengeluaran)
                ->with('pengeluaran_total',$pengeluaran_total);

            });
        })->export('xls');
    }

    public function rekap_laporan($dari,$sampai){

        $title = 'laporan rekap';
        $pemasukan = DB::table('datapemasukan as dp')
        ->join('datadistributor as dd','dp.sumber_pemasukan_id','=','dd.id')
        ->whereBetween('tanggal',[$dari,$sampai])->get();
        $pemasukan_total = DB::table('datapemasukan as dp')
        ->join('datadistributor as dd','dp.sumber_pemasukan_id','=','dd.id')
        ->whereBetween('tanggal',[$dari,$sampai])->sum('total_pemasukan');
        $pengeluaran = DB::table('datapengeluaran')
        ->whereBetween('tanggal_pengeluaran',[$dari,$sampai])->get();
        $pengeluaran_total = DB::table('datapengeluaran')
        ->whereBetween('tanggal_pengeluaran',[$dari,$sampai])->sum('nominal_luar');

        // if($pemasukan_total>=$pengeluaran_total){
        //     $laba=$pemasukan_total -$pengeluaran_total;
        // }elseif ($pemasukan_total<=$pengeluaran_total){
        //     $rugi=$pemasukan_total -$pengeluaran_total;
        // }else{
        //     $laba=0;
        //     $rugi=0;
        // }


        Excel::create($title, function($excel) use($pemasukan,$pemasukan_total,$pengeluaran,$pengeluaran_total) {
            $excel->sheet('Sheetname', function($sheet) use($pemasukan,$pemasukan_total,$pengeluaran,$pengeluaran_total) {

                $sheet->loadView('laporan.laporan_rekap_excel')->with('pemasukan',$pemasukan)->with('pemasukan_total',$pemasukan_total)->with('pengeluaran',$pengeluaran)
                ->with('pengeluaran_total',$pengeluaran_total);

            });
        })->export('xls');

    }
}
