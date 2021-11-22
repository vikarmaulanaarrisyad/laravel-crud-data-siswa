<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index () 
    {
        // Membuat Variabel siswa
        $data_siswa = Siswa::all(); //Mengambil semua data siswa

        return view('siswa.index', compact('data_siswa'));
    }

    public function create (Request $request) 
    {
        Siswa::create($request->all());
        return redirect('siswa')->with('sukses','Data Berhasil diinputkan!');
    }
}
