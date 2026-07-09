<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\Gerakan;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show(Request $request, $urutan)
    {
        $modeName = $request->query('mode', 'dewasa');
        if (!in_array($modeName, ['dewasa', 'anak'])) {
            $modeName = 'dewasa';
        }

        $mode = Mode::where('nama_mode', $modeName)->firstOrFail();
        
        $gerakan = Gerakan::where('mode_id', $mode->id)
            ->where('urutan', $urutan)
            ->with('bacaans')
            ->firstOrFail();

        // Get all movements in the same mode for navigation/dots
        $allGerakans = Gerakan::where('mode_id', $mode->id)->orderBy('urutan')->get();

        $meta = Kelompok::first() ?: (object)[
            'nama_kelompok' => 'Kelompok 5',
            'prodi' => 'Pendidikan Agama Islam — FKIP',
            'mata_kuliah' => 'Media Pembelajaran PAI',
            'dosen' => 'Dr. H. Ahmad Fauzi, M.Pd.I'
        ];

        if ($modeName === 'anak') {
            return view('detail.anak', compact('gerakan', 'allGerakans', 'urutan', 'meta', 'modeName'));
        }

        return view('detail.dewasa', compact('gerakan', 'allGerakans', 'urutan', 'meta', 'modeName'));
    }
}
