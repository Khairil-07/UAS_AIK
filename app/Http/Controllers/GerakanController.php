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

    // Menentukan status mode
    $isAnak = Str::contains(strtolower($gerakan->mode->nama_mode), 'anak');
    
    // 1. KONTROL DETIK MULAI (Ambil langsung dari database)
    $videoStart = $isAnak 
        ? $gerakan->video_start_anak 
        : $gerakan->video_start_dewasa;

    // 2. KONTROL DETIK BERHENTI (Disarankan ambil dari kolom database sendiri agar akurat)
    // Jika belum membuat kolom video_end, Anda bisa tetap memakai logika $next Anda sebelumnya di bawah ini
    $videoEnd = $isAnak 
        ? ($gerakan->video_end_anak ?? ($next ? $next->video_start_anak : null))
        : ($gerakan->video_end_dewasa ?? ($next ? $next->video_start_dewasa : null));

    // ==========================
    // MODE ANAK
    // ==========================
    if ($isAnak) {
        return view('gerakan.show-anak', compact(
            'gerakan', 'previous', 'next', 'totalGerakan', 'current', 'progress', 'videoStart', 'videoEnd'
        ));
    }

    // ==========================
    // MODE DEWASA
    // ==========================
    return view('gerakan.show-dewasa', compact(
        'gerakan', 'previous', 'next', 'totalGerakan', 'current', 'progress', 'videoStart', 'videoEnd'
    ));
    }
}