<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use yajra\Datatables\Datatables;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = DB::table('pemasukan as a')->join('tb_sumber_pemasukan as b', 'a.sumber_pemasukan_id', '=', 'b.id')->get();
        return view('pemasukan.pemasukan_index', compact('data'));
    }
    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $pemasukan = DB::table('pemasukan')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'pemasukan_id',
            'sumber_pemasukan_id',
            'nominal',
            'tanggal',
            'keterangan'
        ]);
        $datatables = Datatables::of($pemasukan);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
}
