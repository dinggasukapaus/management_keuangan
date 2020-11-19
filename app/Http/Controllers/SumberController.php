<?php

namespace App\Http\Controllers;


use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SumberController extends Controller
{

    public function index()
    {
        $sumber =  DB::table('tb_pemasukan')->get();


        return view('sumber.sumber_index', compact('sumber'));
    }

    public function add()
    {

        return view('sumber.sumber_add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $nama = $request->nama;
        DB::table('tb_pemasukan')->insert([
            'id' => Uuid::generate(4),
            'nama' => $nama,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

        return redirect('sumber-pemasukan');
    }
}
