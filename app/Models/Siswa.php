<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    // Menambah $table
    protected $table = 'siswa';
    //  Menambahkan Guarded
    protected $guarded = [''];

    public function getAvatar()
    {
        // Mengecek Apakah Gambar ada di databse atau NULL
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        // jika ada
         return asset('images/'.$this->avatar);
    }

    // Relasi Dari Tabel Siswa ke Mapel dengan ManyToMany
    public function mapel () {
        // sertakan mengambil pivot
        return $this->belongsToMany(Mapel::class)->withPivot('nilai')->withTimestamps();
    }

    public function rataRatanilai ()
    {
        // Mengambil Nilai2
        $total = 0;
        $hitung = 0;
        foreach ($this->mapel as $mapel) {
            $total = $total + $mapel->pivot->nilai;
            $hitung++;
        }

        if ($hitung == 0 ) {
         return 0;
        }
       return round($total/$hitung);
    }

    public function nama_lengkap ()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

}
