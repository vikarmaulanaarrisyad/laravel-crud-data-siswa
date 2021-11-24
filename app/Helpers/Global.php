<?php

use App\Models\Guru;
use App\Models\Siswa;

function rangking5Besar ()
{
    $siswa = Siswa::all();
    $siswa->map(function($s){
        $s->rataRataNilai = $s->rataRataNilai();
        return $s;

    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
    return $siswa;
}

function totalsiswa ()
{
  return Siswa::count();
}

function totalguru ()
{
    return Guru::count();
}
