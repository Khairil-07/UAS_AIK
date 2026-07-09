<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mode;
use App\Models\Kelompok;
use App\Models\Gerakan;
use App\Models\Bacaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default user
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin PAI',
                'password' => bcrypt('admin123'),
            ]
        );

        // Seed modes
        $modeDewasa = Mode::updateOrCreate(
            ['id' => 1],
            [
                'nama_mode' => 'dewasa',
                'deskripsi' => 'Tampilan formal dengan teks Arab lengkap, transliterasi, terjemahan, dan penjelasan ilmiah.'
            ]
        );

        $modeAnak = Mode::updateOrCreate(
            ['id' => 2],
            [
                'nama_mode' => 'anak',
                'deskripsi' => 'Tampilan ceria dengan ilustrasi besar dan bahasa yang mudah dipahami anak-anak.'
            ]
        );

        // Seed kelompoks (metadata)
        Kelompok::updateOrCreate(
            ['id' => 1],
            [
                'nama_kelompok' => 'Kelompok 5',
                'prodi' => 'Pendidikan Agama Islam — FKIP',
                'mata_kuliah' => 'Media Pembelajaran PAI',
                'dosen' => 'Dr. H. Ahmad Fauzi, M.Pd.I'
            ]
        );

        // Seed gerakans & bacaans from movements.json
        $jsonPath = database_path('data/movements.json');
        if (File::exists($jsonPath)) {
            $movements = json_decode(File::get($jsonPath), true);
            foreach ($movements as $m) {
                // 1. Adult (Dewasa) movement
                $gerakanDewasa = Gerakan::updateOrCreate(
                    [
                        'mode_id' => $modeDewasa->id,
                        'urutan' => $m['sortOrder']
                    ],
                    [
                        'nama_gerakan' => $m['name'],
                        'subjudul' => $m['subtitle'],
                        'deskripsi' => $m['description'],
                        'gambar_url' => $m['emoji'],
                        'video_url' => $m['videoUrl'] ?: null,
                    ]
                );

                // Adult reading (Bacaan)
                Bacaan::updateOrCreate(
                    [
                        'gerakan_id' => $gerakanDewasa->id,
                        'urutan' => 1
                    ],
                    [
                        'teks_arab' => $m['arabic'],
                        'teks_latin' => $m['transliteration'],
                        'terjemahan' => $m['translation'],
                        'audio_url' => $m['audioUrl'] ?: null,
                        'sumber' => 'Himpunan Putusan Tarjih (HPT) Muhammadiyah',
                    ]
                );

                // 2. Child (Anak) movement
                $gerakanAnak = Gerakan::updateOrCreate(
                    [
                        'mode_id' => $modeAnak->id,
                        'urutan' => $m['sortOrder']
                    ],
                    [
                        'nama_gerakan' => $m['name'],
                        'subjudul' => $m['subtitle'],
                        'deskripsi' => $m['kidsDesc'],
                        'gambar_url' => $m['emoji'],
                        'video_url' => $m['videoUrl'] ?: null,
                    ]
                );

                // Child reading (Bacaan)
                Bacaan::updateOrCreate(
                    [
                        'gerakan_id' => $gerakanAnak->id,
                        'urutan' => 1
                    ],
                    [
                        'teks_arab' => $m['arabic'],
                        'teks_latin' => $m['transliteration'],
                        'terjemahan' => $m['translation'],
                        'audio_url' => $m['audioUrl'] ?: null,
                        'sumber' => 'Himpunan Putusan Tarjih (HPT) Muhammadiyah',
                    ]
                );
            }
        }
    }
}
