<?php

namespace App\Http\Controllers;

use App\Models\Mode;

class HomeController extends Controller
{
    public function index()
{
    $modes = Mode::all();

    $modeAnak = $modes->first(function ($mode) {
        return str_contains(strtolower($mode->nama_mode), 'anak');
    });

    $modeDewasa = $modes->first(function ($mode) {
        return str_contains(strtolower($mode->nama_mode), 'dewasa');
    });

    return view('home', compact(
        'modeAnak',
        'modeDewasa'
    ));
}
}