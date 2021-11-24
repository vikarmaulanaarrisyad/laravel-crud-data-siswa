<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function profile ($id)
    {
        $guru = Guru::find($id);
        return view('guru.profile', compact('guru'));
    }
}
