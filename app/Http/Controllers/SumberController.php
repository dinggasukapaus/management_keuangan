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
            'nama' => 'required|min:0|unique:datadistributor|max:30|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'nohp' => 'required|numeric|digits_between:2,14',
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
        Alert::success('Selamat anda berhasil mengiputkan');


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
            'nama' => 'required|min:0|max:30|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'nohp' => 'required|numeric|digits_between:2,14',
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
        toast('Selamat anda telah berhasil mengubah data', 'success');
        // return redirect('sumber-pemasukan')->withToastSuccess($request->keterangan, 'berhasil di update');


        return redirect('sumber-pemasukan');
    }

    public function delete($id)
    {
        $total_pemasukan = DB::table('datapemasukan')->get()->sum('total_pemasukan');
        if ($total_pemasukan) {
        return back()->withMessage('tidak bisa delete: karena masih ada data pemasukan');
        }
        DB::table('datadistributor')->where('id', $id)->delete();
        Alert::info('data', ' telat hapus');
        return redirect('sumber-pemasukan');
    }
}
