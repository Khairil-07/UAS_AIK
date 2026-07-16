<?php

namespace App\Http\Controllers;

use App\Models\Gerakan;
use App\Models\Mode;
use Illuminate\Support\Str;

class GerakanController extends Controller
{
    /**
     * Daftar gerakan berdasarkan mode
     */
    public function index(Mode $mode)
    {
        $gerakans = Gerakan::where('mode_id', $mode->id)
            ->orderBy('urutan')
            ->get();

        if (Str::contains(strtolower($mode->nama_mode), 'anak')) {
            return view('gerakan.index-anak', compact(
                'mode',
                'gerakans'
            ));
        }

        return view('gerakan.index-dewasa', compact(
            'mode',
            'gerakans'
        ));
    }

    /**
     * Detail gerakan
     */
    public function show(Gerakan $gerakan)
    {
        $gerakan->load('bacaans', 'mode');

        $previous = Gerakan::where('mode_id', $gerakan->mode_id)
            ->where('urutan', '<', $gerakan->urutan)
            ->orderByDesc('urutan')
            ->first();

        $next = Gerakan::where('mode_id', $gerakan->mode_id)
            ->where('urutan', '>', $gerakan->urutan)
            ->orderBy('urutan')
            ->first();

        $totalGerakan = Gerakan::where('mode_id', $gerakan->mode_id)->count();

        $current = $gerakan->urutan;

        $progress = ($current / $totalGerakan) * 100;
        $videoStart = Str::contains(
        strtolower($gerakan->mode->nama_mode),
        'anak'
    )
        ? $gerakan->video_start_anak
        : $gerakan->video_start_dewasa;

        // ==========================
        // MODE ANAK
        // ==========================

        if (Str::contains(strtolower($gerakan->mode->nama_mode), 'anak')) {

            return view('gerakan.show-anak', compact(
                'gerakan',
                'previous',
                'next',
                'totalGerakan',
                'current',
                'progress',
                'videoStart'
            ));
        }

        // ==========================
        // MODE DEWASA
        // ==========================

        return view('gerakan.show-dewasa', compact(
            'gerakan',
            'previous',
            'next',
            'totalGerakan',
            'current',
            'progress',
            'videoStart'
        ));
    }
}