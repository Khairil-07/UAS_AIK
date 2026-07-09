<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Gerakan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $meta = Kelompok::first() ?: (object)[
            'nama_kelompok' => 'Kelompok 5',
            'prodi' => 'Pendidikan Agama Islam — FKIP',
            'mata_kuliah' => 'Media Pembelajaran PAI',
            'dosen' => 'Dr. H. Ahmad Fauzi, M.Pd.I'
        ];

        // Retrieve movements for both modes
        $gerakansDewasa = Gerakan::where('mode_id', 1)->orderBy('urutan')->get();
        $gerakansAnak = Gerakan::where('mode_id', 2)->orderBy('urutan')->get();

        $defaultMode = $request->query('mode', 'dewasa');

        return view('dashboard.index', compact('meta', 'gerakansDewasa', 'gerakansAnak', 'defaultMode'));
    }
}
