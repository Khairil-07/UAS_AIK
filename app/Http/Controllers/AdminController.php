<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use App\Models\Gerakan;
use App\Models\Bacaan;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function index()
    {
        $meta = Kelompok::first() ?: (object)[
            'nama_kelompok' => 'Kelompok 5',
            'prodi' => 'Pendidikan Agama Islam — FKIP',
            'mata_kuliah' => 'Media Pembelajaran PAI',
            'dosen' => 'Dr. H. Ahmad Fauzi, M.Pd.I'
        ];

        // Gather the 12 movements, grouping adult and kids content for ease of editing
        $movements = [];
        for ($i = 1; $i <= 12; $i++) {
            $dewasa = Gerakan::where('mode_id', 1)->where('urutan', $i)->first();
            $anak = Gerakan::where('mode_id', 2)->where('urutan', $i)->first();
            if ($dewasa && $anak) {
                $bacaan = $dewasa->bacaans()->first();
                $movements[] = (object) [
                    'urutan' => $i,
                    'name' => $dewasa->nama_gerakan,
                    'subtitle' => $dewasa->subjudul,
                    'emoji' => $dewasa->gambar_url,
                    'videoUrl' => $dewasa->video_url,
                    'description' => $dewasa->deskripsi,
                    'kidsDesc' => $anak->deskripsi,
                    'arabic' => $bacaan ? $bacaan->teks_arab : '',
                    'transliteration' => $bacaan ? $bacaan->teks_latin : '',
                    'translation' => $bacaan ? $bacaan->terjemahan : '',
                    'audioUrl' => $bacaan ? $bacaan->audio_url : '',
                ];
            }
        }

        return view('admin.index', compact('meta', 'movements'));
    }

    public function updateGerakan(Request $request)
    {
        $request->validate([
            'urutan' => 'required|integer|between:1,12',
            'name' => 'required|string|max:100',
            'subtitle' => 'nullable|string|max:100',
            'emoji' => 'nullable|string|max:50',
            'videoUrl' => 'nullable|string',
            'description' => 'nullable|string',
            'kidsDesc' => 'nullable|string',
            'arabic' => 'required|string',
            'transliteration' => 'required|string',
            'translation' => 'required|string',
            'audioUrl' => 'nullable|string',
        ]);

        $urutan = $request->input('urutan');

        // 1. Update Dewasa (Adult)
        $gerakanDewasa = Gerakan::where('mode_id', 1)->where('urutan', $urutan)->first();
        if ($gerakanDewasa) {
            $gerakanDewasa->update([
                'nama_gerakan' => $request->input('name'),
                'subjudul' => $request->input('subtitle'),
                'gambar_url' => $request->input('emoji'),
                'video_url' => $request->input('videoUrl'),
                'deskripsi' => $request->input('description'),
            ]);

            $bacaanDewasa = $gerakanDewasa->bacaans()->first();
            if ($bacaanDewasa) {
                $bacaanDewasa->update([
                    'teks_arab' => $request->input('arabic'),
                    'teks_latin' => $request->input('transliteration'),
                    'terjemahan' => $request->input('translation'),
                    'audio_url' => $request->input('audioUrl'),
                ]);
            }
        }

        // 2. Update Anak (Kids)
        $gerakanAnak = Gerakan::where('mode_id', 2)->where('urutan', $urutan)->first();
        if ($gerakanAnak) {
            $gerakanAnak->update([
                'nama_gerakan' => $request->input('name'),
                'subjudul' => $request->input('subtitle'),
                'gambar_url' => $request->input('emoji'),
                'video_url' => $request->input('videoUrl'),
                'deskripsi' => $request->input('kidsDesc'),
            ]);

            $bacaanAnak = $gerakanAnak->bacaans()->first();
            if ($bacaanAnak) {
                $bacaanAnak->update([
                    'teks_arab' => $request->input('arabic'),
                    'teks_latin' => $request->input('transliteration'),
                    'terjemahan' => $request->input('translation'),
                    'audio_url' => $request->input('audioUrl'),
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Gerakan berhasil diperbarui']);
    }

    public function updateMeta(Request $request)
    {
        $request->validate([
            'group' => 'required|string|max:100',
            'program' => 'required|string|max:100',
            'course' => 'required|string|max:100',
            'lecturer' => 'required|string|max:100',
        ]);

        $meta = Kelompok::first();
        if (!$meta) {
            $meta = new Kelompok();
        }

        $meta->nama_kelompok = $request->input('group');
        $meta->prodi = $request->input('program');
        $meta->mata_kuliah = $request->input('course');
        $meta->dosen = $request->input('lecturer');
        $meta->save();

        return response()->json(['success' => true, 'message' => 'Identitas aplikasi berhasil diperbarui']);
    }

    public function resetDatabase()
    {
        try {
            Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
            return response()->json(['success' => true, 'message' => 'Database berhasil direset ke default']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal mereset database: ' . $e->getMessage()], 500);
        }
    }
}
