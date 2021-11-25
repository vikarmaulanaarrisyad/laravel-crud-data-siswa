<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
   public function register (Request $request)
   {
    //    dd($request->all());
       //    Insert ke table user
       $user = new User;
       $user->role = 'siswa';
       $user->name = $request->nama_depan;
       $user->email = $request->email;
       $user->password = bcrypt( $request->password);
       $user->save();

       //  Insert ke table siswa
       $request->request->add(['user_id' => $user->id]);
       $siswa =  Siswa::create($request->all());
          //  Insert ke table siswa
          $request->request->add(['user_id' => $user->id]);
          $siswa =  Siswa::create($request->all());
  
          // Update file gambar avatar
          if ($request->hasFile('avatar')) {
              // Membuat path lokasi gambar beserta nama
              $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
  
              // Memasukan ke database
              $siswa->avatar = $request->file('avatar')->getClientOriginalName();
              $siswa->save();
          }
  
          return redirect('/')->with('sukses', 'Data Berhasil diinputkan!');
   }
    public function home ()
    {
        return view('sites.home');
    }

    public function about ()
    {
        return view('sites.about');
    }

}
