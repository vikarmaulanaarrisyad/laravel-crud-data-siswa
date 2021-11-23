<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Nette\Utils\Random;

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
      
    //    Insert ke table user
       $user = new User;
       $user->role = 'siswa';
       $user->name = $request->nama_depan;
       $user->email = $request->email;
       $user->password = bcrypt('rahasia');
    //    $user->remember_token = Str::random(60);
       $user->save();

         //  Insert ke table siswa
         $request->request->add(['user_id' => $user->id]);
         $siswa =  Siswa::create($request->all());

        return redirect('siswa')->with('sukses', 'Data Berhasil diinputkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id); //Mengambil data siswa berdasarkan ID
        return view('siswa/edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $siswa = Siswa::find($id);

        // Update file gambar avatar
        if ($request->hasFile('avatar')) {
            // Membuat path lokasi gambar beserta nama
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());

            // Memasukan ke database
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        
        return redirect('siswa')->with('sukses', 'Data Berhasil diubah!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);

        return redirect('siswa')->with('sukses', 'Data Berhasil dihapus!');
    }

    // Membuat metod profile

    public function profile ($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.profile', compact('siswa'));
    }
}
