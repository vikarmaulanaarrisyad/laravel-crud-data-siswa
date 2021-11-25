<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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
        // Membuat validasi
        $this->validate($request, [
            'nama_depan' => 'min:3|required',
            'email' => 'email|required|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpg,png',
        ]);

        //    Insert ke table user
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->save();

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

        return redirect('siswa')->with('sukses', 'Data Berhasil diinputkan!');
    }

    public function edit(Siswa $siswa)
    {
        // $siswa = Siswa::find($id); //Mengambil data siswa berdasarkan ID
        return view('siswa/edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        // dd($request->all());
        // $siswa = Siswa::find($id);

        // Update file gambar avatar
        if ($request->hasFile('avatar')) {
            // Membuat path lokasi gambar beserta nama
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());

            // Memasukan ke database
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('siswa')->with('sukses', 'Data Berhasil diubah!');
    }

    public function destroy(Siswa $siswa)
    {
        // $siswa = Siswa::find($id);
        $siswa->delete($siswa);

        return redirect('siswa')->with('sukses', 'Data Berhasil dihapus!');
    }

    // Membuat metod profile

    public function profile(Siswa $siswa)
    {
        // $siswa = Siswa::find($id);
        $matapelajaran = Mapel::all();
        // Menyiapkan data untuk chart
        $categories = [];
        $data = [];
        // Looping untuk matapelajaran
        foreach ($matapelajaran as $mp) {
            // Jika Siswa memiliki mapel dan nilai maka code ini akan dijalankan
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }

        }

        // dd($data);
        return view('siswa.profile', compact('siswa','matapelajaran','categories','data'));
    }

    public function addnilai (Request $request, $idsiswa) 
    {    
        // Memasukan Data dari form ke pivot tabel mapel_siswa
        $siswa = Siswa::find($idsiswa);

        // Membuat Validasi jika mapel sudah ada 
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data mata pelajaran sudah ada');
        }
        // Relasinya dari tabel mapel
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data Nilai Berhasil ditambahkan');
    }

    public function deletenilai ($idsiswa, $idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);

        return redirect()->back()->with('sukses','Data Nilai Berhasil Dihapus');
    }

    // Export Excel
    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Data-Siswa.xlsx');
    }

    public function exportpdf ()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf',compact('siswa'));
        // dd($pdf);
        return $pdf->download('Laporan Data Siswa.pdf');
    }
}
