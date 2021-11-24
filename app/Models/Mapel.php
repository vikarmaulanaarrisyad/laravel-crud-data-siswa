<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
     // Menambah $table
     protected $table = 'mapel';
     protected $guarded = [];

    //  Relasi Table Dari Mapel Ke siswa
    public function siswa (){
        return $this->belongsToMany(Siswa::class)->withPivot('nilai'); 
    }

    public function guru ()
    {
        return $this->belongsTo(Guru::class);
    }
}
