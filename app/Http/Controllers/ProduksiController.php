<?php

namespace App\Http\Controllers;

use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProduksiController extends Controller
{
    public function index()
    {
        $data = DB::table('dataproduksi')->get();
        return view('produksi.produksi_index',compact('data'));
    }

    public function add()
    {
        return view('produksi.produksi_add');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'produksi'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'pengeluaran'=>'required|numeric|gt:1000|max:100000',
            'jumlah'=>'required|numeric|min:1',
            'tanggal'=>'required|date|unique:dataproduksi'
        ],
        [
            'max'=>'maximal Rp.100000',
            'gt'=>'minimal Rp.1000'
        ]
    );

        DB::table('dataproduksi')->insert([
            'produksi_id'=>Uuid::generate(4),
            'produksi'=>$request->produksi,
            'jumlah'=>$request->jumlah,
            'pengeluaran'=>$request->pengeluaran*$request->jumlah,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
        ]);

        Alert::success('data' ,'berhasil di tambahkan');

        return redirect('produksi');

    }
    public function edit($id)
    {
        $data = DB::table('dataproduksi')->where('produksi_id',$id)->first();
        return view('produksi.produksi_edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'produksi'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'pengeluaran'=>'required|numeric|gt:1000|max:100000',
            'jumlah'=>'required|numeric|min:1',
            'tanggal'=>'required|date'
        ],
        [
            'max'=>'maximal Rp.100000',
            'gt'=>'minimal Rp.1000'
        ]
    );

        DB::table('dataproduksi')->where('produksi_id',$id)->update([
            'produksi'=>$request->produksi,
            'pengeluaran'=>$request->pengeluaran*$request->jumlah,
            'jumlah'=>$request->jumlah,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
        ]);
        toast('data berhasil di ubah', 'success');
        return redirect('produksi');

    }
    public function delete($id)
    {
        DB::table('dataproduksi')->where('produksi_id',$id)->delete();
        Alert::info('data', ' telat hapus');
        return redirect('produksi');
    }
}
