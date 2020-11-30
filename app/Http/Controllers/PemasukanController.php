<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = DB::table('pemasukan')->get();
        return view('pemasukan.pemasukan_index', compact('data'));
    }
}
