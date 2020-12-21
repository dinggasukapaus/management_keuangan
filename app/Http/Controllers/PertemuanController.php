<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PertemuanController extends Controller
{
    public function index()
    {
        $data = DB::table('datapertemuan')->get();
        return view('pertemuan.pertemuan_index',compact('data'));
    }

    public function add()
    {
        return view('pertemuan.pertemuan_add');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'keterangan'=>'required|string',
            'tempat'=>'required',
            'tanggal'=>'required|unique:datapertemuan|date|after:tomorrow',
            'waktu'=>'required'
        ]);

        DB::table('datapertemuan')->insert([
            'pertemuan_id'=>Uuid::generate(4),
            'keterangan'=>$request->keterangan,
            'tempat'=>$request->tempat,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
            'waktu'=>date('H:i:s',strtotime($request->waktu))
        ]);

        Alert::success('selamat' ,'anda berhasil menginputkan');

        return redirect('pertemuan');

    }
    public function edit($id)
    {
        $data = DB::table('datapertemuan')->where('pertemuan_id',$id)->first();
        return view('pertemuan.pertemuan_edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'keterangan'=>'required|string',
            'tempat'=>'required',
            'tanggal'=>'required|unique:datapertemuan|date',
            'waktu'=>'required'
        ]);

        DB::table('datapertemuan')->where('pertemuan_id',$id)->update([
            'keterangan'=>$request->keterangan,
            'tempat'=>$request->tempat,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
            'waktu'=>date('H:i:s',strtotime($request->waktu))
        ]);
        toast('selamat anda telah berhasil mengubah data', 'success');
        return redirect('pertemuan');

    }
    public function delete($id)
    {
        DB::table('datapertemuan')->where('pertemuan_id',$id)->delete();
        Alert::info('data', ' telat hapus');
        return redirect('pertemuan');
    }
}
