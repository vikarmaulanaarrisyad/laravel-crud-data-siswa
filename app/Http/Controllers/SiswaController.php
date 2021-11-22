<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        // Membuat Function Cari
        if ($request->has('cari')) {
            $data_siswa = Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            // Membuat Variabel siswa
            $data_siswa = Siswa::all(); //Mengambil semua data siswa
        }



        return view('siswa.index', compact('data_siswa'));
    }

    public function create(Request $request)
    {
        Siswa::create($request->all());
        return redirect('siswa')->with('sukses', 'Data Berhasil diinputkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id); //Mengambil data siswa berdasarkan ID
        return view('siswa/edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());

        return redirect('siswa')->with('sukses', 'Data Berhasil diubah!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);

        return redirect('siswa')->with('sukses', 'Data Berhasil dihapus!');
    }
}
