<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function index(){
        $data = DB::table('tb_pengeluaran')->get();
        return view('pengeluaran.pengeluaran_index',compact('data'));
    }

    public function add(){
        return view('pengeluaran.pengeluaran_add
        ');

    }

    public function store(Request $request){
        $this->validate($request,[
            'nominal_luar'=>'required',
            'tanggal_pengeluaran'=>'required',
            'keterangan'=>'required'
        ]);

       DB::table('tb_pengeluaran')->insert([
            'pengeluaran_id' =>\Uuid::generate(4),
            'nominal_luar' =>$request->nominal_luar,
            'tanggal_pengeluaran' =>date('Y-m-d',strtotime($request->tanggal_pengeluaran)),
            'keterangan' =>$request->keterangan
        ]);


        Alert::success('selamat pengeluaran',' telat ditambah');
        return redirect('pengeluaran');
    }
}
