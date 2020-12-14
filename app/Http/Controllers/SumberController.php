<?php

namespace App\Http\Controllers;



use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SumberController extends Controller
{

    public function index()
    {
        $sumber =  DB::table('datadistributor')->get();


        return view('sumber.sumber_index', compact('sumber'));
    }

    public function add()
    {

        return view('sumber.sumber_add');
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'nama' => 'required',
            'nohp' => 'required|digits_between:1,12|numeric',
            'alamat' => 'required'
        ]);

        $nama = $request->nama;
        $nohp = $request->nohp;
        $alamat = $request->alamat;
        DB::table('datadistributor')->insert([
            'id' => Uuid::generate(4),
            'nama' => $nama,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        Alert::success('selamat', $nama . ' telat ditambah');


        return redirect('sumber-pemasukan');
    }

    public function edit($id)
    {
        $data = DB::table('datadistributor')->where('id', $id)->first();

        return view('sumber.sumber_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        //proses update
        DB::table('datadistributor')->where('id', $id)->update([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'updated_at' => date('Y-m-d  H:i;s'),
        ]);

        // Alert::success('selamat', $request->keterangan . ' di update');
        toast('data anda berhasil di update !', 'success');
        // return redirect('sumber-pemasukan')->withToastSuccess($request->keterangan, 'berhasil di update');


        return redirect('sumber-pemasukan');
    }

    public function delete($id)
    {
        DB::table('datadistributor')->where('id', $id)->delete();
        Alert::info('data', ' telat hapus');
        return redirect('sumber-pemasukan');
    }
}
