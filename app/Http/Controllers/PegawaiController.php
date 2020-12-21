<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = DB::table('datapegawai')->get();
        return view('pegawai.pegawai_index',compact('data'));
    }

    public function add()
    {
        return view('pegawai.pegawai_add');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required|unique:datapegawai|min:6|max:30|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'nohp'=>'required|digits_between:0,14|numeric',
            'jabatan'=>'required',
            'alamat'=>'required'
        ],
        [
            //?
            'required'=>'wajib di isi',
        ]
    );

        DB::table('datapegawai')->insert([
            'pegawai_id'=>Uuid::generate(4),
            'nama'=>$request->nama,
            'nohp'=>$request->nohp,
            'jabatan'=>$request->jabatan,
            'alamat'=>$request->alamat
        ]);

        Alert::success('selamat' ,'anda berhasil menginputkan');

        return redirect('pegawai');

    }
    public function edit($id)
    {
        $data = DB::table('datapegawai')->where('pegawai_id',$id)->first();
        return view('pegawai.pegawai_edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama'=>'required|min:6|max:30|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'nohp'=>'required|digits_between:0,14|numeric',
            'jabatan'=>'required',
            'alamat'=>'required'
        ]);

        DB::table('datapegawai')->where('pegawai_id',$id)->update([
            'nama'=>$request->nama,
            'nohp'=>$request->nohp,
            'jabatan'=>$request->jabatan,
            'alamat'=>$request->alamat
        ]);
        toast('semalat anda telah berhasil mengubah data', 'success');
        return redirect('pegawai');

    }
    public function delete($id)
    {
        DB::table('datapegawai')->where('pegawai_id',$id)->delete();
        Alert::info('data', ' telat hapus');
        return redirect('pegawai');
    }
}
