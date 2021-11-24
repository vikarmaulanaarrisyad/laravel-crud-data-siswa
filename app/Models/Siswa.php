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

}
