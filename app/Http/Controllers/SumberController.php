<?php

namespace App\Http\Controllers;


use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SumberController extends Controller
{

    public function tampilanawal()
    {
        $sumber =  DB::table('tb_pemasukan')->get();
        $sumberpengeluaran =  DB::table('tb_pengeluaran')->get();


        return view('welcome', compact('sumber'), compact('sumberpengeluaran'));
    }


    public function index()
    {
        $sumber =  DB::table('tb_pemasukan')->get();
        $sumberpengeluaran =  DB::table('tb_pengeluaran')->get();


        return view('sumber.sumber_index', compact('sumber'), compact('sumberpengeluaran'));
    }

    public function add()
    {

        return view('sumber.sumber_add');
    }


        public function store(Request $request)
        {
            // untuk validasi form
    $this -> validate($request, [
        'keterangan' => 'required',
        'jumlah' => 'required',
        'tanggal' => 'required'
    ]);
    // insert data ke table books
    DB::table('tb_pemasukan') -> insert([
        'keterangan' => $request -> keterangan,
        'jumlah' => $request -> jumlah,
        'tanggal' => $request -> tanggal
            ]);

            return redirect('sumber-pemasukan');
        }


        public function edit($id)
{
        // mengambil data books berdasarkan id yang dipilih
        $sumber = DB::table('tb_pemasukan')-> where ('id',$id)->first();
        // passing data books yang didapat ke view edit.blade.php
        return view('sumber.sumber_editpemasukan', compact('sumber'));


}



        public function update(Request $request)
        {

            //untuk validasi form
             $this -> validate($request, [
                'keterangan' => 'required',
                'jumlah' => 'required',
                'tanggal' => 'required',

             ]);
            //  update data books
             $sumber =DB::table('tb_pemasukan') -> where('id', $request) -> update([
                 'keterangan' => $request -> keterangan,
                 'jumlah' => $request -> jumlah,
                 'tanggal' => $request -> tanggal
             ]);
            //  alihkan halaman edit ke halaman books
             return view ('sumber.sumber_index', compact('sumber'));

        }

        public function destroy($id)
        {
            // menghapus data books berdasarkan id yang dipilih
            DB::table('tb_pemasukan') -> where('id', $id) -> delete();
            // Alihkan ke halaman books
            return redirect('sumber-pemasukan') -> with('status', 'Data Pemasukaan Berhasil DiHapus');
        }




                    // SUMBER PENGELUARAN

                    public function addpengeluaran()
                    {

                        return view('sumber.sumber_addpengeluaran');
                    }

                    public function editpengeluaran($id)
                    {
                            // mengambil data books berdasarkan id yang dipilih
                            $sumber = DB::table('tb_pengeluaran')-> where ('id',$id)->first();
                            // passing data books yang didapat ke view edit.blade.php
                            return view('sumber.sumber_editpengeluaran', compact('sumber'));


                    }

                    public function storepengeluaran(Request $request)
                            {
                                // untuk validasi form
                        $this -> validate($request, [
                            'keterangan' => 'required',
                            'jumlah' => 'required',
                            'tanggal' => 'required'
                        ]);
                        // insert data ke table books
                        DB::table('tb_pengeluaran') -> insert([
                            'keterangan' => $request -> keterangan,
                            'jumlah' => $request -> jumlah,
                            'tanggal' => $request -> tanggal
                                ]);

                                return redirect('sumber-pemasukan');
                            }

                     public function destroypengeluaran($id)
                            {
                                // menghapus data books berdasarkan id yang dipilih
                                DB::table('tb_pengeluaran') -> where('id', $id) -> delete();
                                // Alihkan ke halaman books
                                return redirect('sumber-pemasukan') -> with('status', 'Data Pemasukaan Berhasil DiHapus');
                            }

                }
