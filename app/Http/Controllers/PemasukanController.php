<?php

namespace App\Http\Controllers;


use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = DB::table('datapemasukan as a')->join('datadistributor as b', 'a.sumber_pemasukan_id', '=', 'b.id')->get();
        return view('pemasukan.pemasukan_index', compact('data'));
    }


    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $pemasukan = DB::table('datapemasukan as a')->join('datadistributor as b', 'a.sumber_pemasukan_id', '=', 'b.id')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'a.pemasukan_id',
            'b.nama',
            'a.sumber_pemasukan_id',
            'a.total_pemasukan',
            'a.jumlah',
            'a.tanggal',
            'a.keterangan'
        ]);
        $datatables = Datatables::of($pemasukan)
        ->addColumn('action',function($aksi){
            //url
            $url_edit =  url('pemasukan/'.$aksi->pemasukan_id) ;
            $url_hapus =  url('pemasukan/'.$aksi->pemasukan_id) ;
            return '<a href="'.$url_edit.'" class="table-action" data-toggle="tooltip" data-original-title="Edit sumber">
            <i class="fas fa-user-edit"></i>
        </a>|
        <a sumber-id="{{ $sb->id }}" id="btn-hapus" class="table-action table-action-delete" href="'.$url_hapus.'" data-toggle="tooltip" data-original-title="Delete sumber">
            <i style="color: red" class="fas fa-trash"></i>
        </a>';
        })->editColumn('total_pemasukan',function($ps){
            $total_pemasukan =$ps->total_pemasukan;
            $total_pemasukan = 'Rp. '.number_format($total_pemasukan,0);
            $total_pemasukan = str_replace(',','.',$total_pemasukan);
            return $total_pemasukan;
        });

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
    public function add(){
        $pemasukan =  DB::table('datadistributor')->get();
        return view('pemasukan.pemasukan_add',compact('pemasukan'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'sumber_pemasukan_id'=>'required',
            'total_pemasukan'=>'required|numeric',
            'jumlah'=>'required|numeric',
            'tanggal'=>'required',
            'keterangan'=>'required'
        ]);
        DB::table('datapemasukan')->insert([
            'pemasukan_id'=>Uuid::generate(4),
            'sumber_pemasukan_id'=>$request->sumber_pemasukan_id,
            'total_pemasukan'=>$request->total_pemasukan*$request->jumlah,
            'jumlah'=>$request->jumlah,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
            'keterangan'=>$request->keterangan
        ]);
        Alert::success('selamat' ,'anda berhasil mengimputkan');

        return redirect('pemasukan');
    }

    public function edit($id){
        $data = DB::table('datapemasukan')->where('pemasukan_id',$id)->first();
        $pemasukan =  DB::table('datadistributor')->get();
        return view('pemasukan.pemasukan_edit',compact('data','pemasukan'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'sumber_pemasukan_id'=>'required',
            'total_pemasukan'=>'required|numeric',
            'jumlah'=>'required|numeric',
            'tanggal'=>'required',
            'keterangan'=>'required'
        ]);

        DB::table('datapemasukan')->where('pemasukan_id',$id)->update([
            'sumber_pemasukan_id'=>$request->sumber_pemasukan_id,
            'total_pemasukan'=>$request->total_pemasukan*$request->jumlah,
            'jumlah'=>$request->jumlah,
            'tanggal'=>date('Y-m-d',strtotime($request->tanggal)),
            'keterangan'=>$request->keterangan
        ]);
        toast('semalat anda telah berhasil mengubah data', 'success');
        return redirect('pemasukan');
    }
    public function delete($id){
        DB::table('datapemasukan')->where('pemasukan_id',$id)->delete();
        Alert::info('data', ' telat hapus');
        return redirect('pemasukan');
    }
}
