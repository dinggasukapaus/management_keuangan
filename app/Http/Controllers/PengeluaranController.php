<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function index(){
        $data = DB::table('datapengeluaran')->get();
        return view('pengeluaran.pengeluaran_index',compact('data'));
    }

    public function add(){
        return view('pengeluaran.pengeluaran_add
        ');

    }

    public function store(Request $request){
        $this->validate($request,[
            'nominal_luar'=>'required|numeric|min:1',
            'tanggal_pengeluaran'=>'required|date',
            'keterangan'=>'required'
        ]);

       DB::table('datapengeluaran')->insert([
            'pengeluaran_id' =>\Uuid::generate(4),
            'nominal_luar' =>$request->nominal_luar,
            'tanggal_pengeluaran' =>date('Y-m-d',strtotime($request->tanggal_pengeluaran)),
            'keterangan' =>$request->keterangan
        ]);


        Alert::success('selamat' ,'anda berhasil mengimputkan');
        return redirect('pengeluaran');
    }

    public function edit($id){
        $data = DB::table('datapengeluaran')->where('pengeluaran_id',$id)->first();

        return view('pengeluaran.pengeluaran_edit',compact('data'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'nominal_luar'=>'required|numeric|min:1',
            'tanggal_pengeluaran'=>'required',
            'keterangan'=>'required'
        ]);

        DB::table('datapengeluaran')->where('pengeluaran_id',$id)->update([
            'nominal_luar'=>$request->nominal_luar,
            'tanggal_pengeluaran'=>date('Y-m-d',strtotime($request->tanggal_pengeluaran)),
            'keterangan'=>$request->keterangan
        ]);
        toast('Selamat anda telah berhasil mengubah data', 'success');

        return redirect('pengeluaran');
    }
    public function delete($id){
        DB::table('datapengeluaran')->where('pengeluaran_id',$id)->delete();
        Alert::info('data', ' telat hapus');
        return redirect('pengeluaran');
    }
}
