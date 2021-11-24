<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    // Mendeklarasikan Table Guru 
    protected $table = 'guru';
    // Menambahkan Mess Asigment 
    protected $guarded = [];

    // Membuat Relasi antara tabel Guru dan mapel
    public function mapel ()
    {
        return $this->hasMany(Mapel::class);
    }
}
