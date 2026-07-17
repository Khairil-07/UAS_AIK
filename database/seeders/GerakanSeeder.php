<?php

namespace Database\Seeders;

use App\Models\Gerakan;
use App\Models\Mode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; // PENTING: Untuk mematikan foreign key check sementara

class GerakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. NONAKTIFKAN DETEKSI FOREIGN KEY DAN BERSIHKAN DATA LAMA
        Schema::disableForeignKeyConstraints();
        Gerakan::truncate();
        Schema::enableForeignKeyConstraints();

        // 2. OTOMATIS UPDATE ID YOUTUBE KE TABEL MODES
        Mode::where('nama_mode', 'like', '%anak%')->update([
            'video_pembelajaran' => 'Hs9obNtwTMY'
        ]);
        Mode::where('nama_mode', 'like', '%dewasa%')->update([
            'video_pembelajaran' => 'QtSj1HQeZ24'
        ]);

        // 3. DAFTAR GERAKAN DENGAN DETIK MULAI DAN DETIK LOMPAT (SKIP)
        // Jika tidak butuh skip di tengah video, isi saja nilainya dengan null
        $gerakans = [
            [
                'nama_gerakan' => 'Takbiratul Ihram',
                'urutan' => 1,
                'deskripsi' => 'Mengangkat kedua tangan sejajar telinga atau bahu sambil mengucapkan takbir.',
                'gambar_anak' => 'gerakan/anak/takbiratul_ihram.png',
                'gambar_dewasa' => 'gerakan/dewasa/takbiratul_ihram.png',
                'video_start_anak' => 59,   
                'video_start_dewasa' => 5, 
                // Contoh: Skip menit tengah pada takbiratul ihram
                'skip_start_anak' => 63, // Ganti angka detik jika ingin ada bagian yang dilompati
                'skip_end_anak' => 80,
                'skip_start_dewasa' => 10,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => 'Berdiri',
                'urutan' => 2,
                'deskripsi' => 'Berdiri tegak sambil membaca doa iftitah, Al-Fatihah, dan surat pendek.',
                'gambar_anak' => 'gerakan/anak/berdiri.png',
                'gambar_dewasa' => 'gerakan/dewasa/berdiri.png',
                'video_start_anak' => 81,  
                'video_start_dewasa' => 10, 
                
                'skip_start_anak' => 229,
                'skip_end_anak' => 241,
                'skip_start_dewasa' => 235,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => "Ruku'",
                'urutan' => 3,
                'deskripsi' => 'Membungkukkan badan hingga punggung lurus dengan kedua tangan memegang lutut.',
                'gambar_anak' => 'gerakan/anak/ruku.png',
                'gambar_dewasa' => 'gerakan/dewasa/ruku.png',
                'video_start_anak' => 242,  
                'video_start_dewasa' => 237, 

                'skip_start_anak' => 252,
                'skip_end_anak' => 271,
                'skip_start_dewasa' => 248,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => "I'tidal",
                'urutan' => 4,
                'deskripsi' => 'Bangkit dari ruku hingga berdiri tegak kembali.',
                'gambar_anak' => 'gerakan/anak/itidal.png',
                'gambar_dewasa' => 'gerakan/dewasa/itidal.png',
                'video_start_anak' => 272,  
                'video_start_dewasa' => 249, 

                'skip_start_anak' => 279,
                'skip_end_anak' => 296,
                'skip_start_dewasa' => 259,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => 'Sujud Pertama',
                'urutan' => 5,
                'deskripsi' => 'Bersujud dengan tujuh anggota tubuh menyentuh tempat sujud.',
                'gambar_anak' => 'gerakan/anak/sujud_pertama.png',
                'gambar_dewasa' => 'gerakan/dewasa/sujud_pertama.png',
                'video_start_anak' => 297,  
                'video_start_dewasa' => 260, 
                
                'skip_start_anak' => 307,
                'skip_end_anak' => 323,
                'skip_start_dewasa' => 273,
                'skip_end_dewasa' => null,
            ], 
            [
                'nama_gerakan' => 'Duduk di Antara Dua Sujud',
                'urutan' => 6,
                'deskripsi' => 'Duduk setelah sujud pertama sambil membaca doa.',
                'gambar_anak' => 'gerakan/anak/duduk_dua_sujud.png',
                'gambar_dewasa' => 'gerakan/dewasa/duduk_dua_sujud.png',
                'video_start_anak' => 324,  
                'video_start_dewasa' => 274, 

                'skip_start_anak' => 334,
                'skip_end_anak' => 346,
                'skip_start_dewasa' => 286,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => 'Sujud Kedua',
                'urutan' => 7,
                'deskripsi' => 'Melakukan sujud kedua seperti sujud pertama.',
                'gambar_anak' => 'gerakan/anak/sujud_kedua.png',
                'gambar_dewasa' => 'gerakan/dewasa/sujud_kedua.png',
                'video_start_anak' => 347,  
                'video_start_dewasa' => 287, 

                'skip_start_anak' => 355,
                'skip_end_anak' => 382,
                'skip_start_dewasa' => 299,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => 'Tasyahud Awal',
                'urutan' => 8,
                'deskripsi' => 'Duduk tasyahud pada rakaat kedua.',
                'gambar_anak' => 'gerakan/anak/tasyahud_awal.png',
                'gambar_dewasa' => 'gerakan/dewasa/tasyahud_awal.png',
                'video_start_anak' => 383,  
                'video_start_dewasa' => 484, 

                'skip_start_anak' => 477,
                'skip_end_anak' => 498,
                'skip_start_dewasa' => 513,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => 'Tasyahud Akhir',
                'urutan' => 9,
                'deskripsi' => 'Duduk tasyahud terakhir sebelum salam.',
                'gambar_anak' => 'gerakan/anak/tasyahud_akhir.png',
                'gambar_dewasa' => 'gerakan/dewasa/tasyahud_akhir.png',
                'video_start_anak' => 499,  
                'video_start_dewasa' => 288, 

                'skip_start_anak' => 601,
                'skip_end_anak' => 621,
                'skip_start_dewasa' => 552,
                'skip_end_dewasa' => null,
            ],
            [
                'nama_gerakan' => 'Salam',
                'urutan' => 10,
                'deskripsi' => 'Menoleh ke kanan dan ke kiri sebagai penutup sholat.',
                'gambar_anak' => 'gerakan/anak/salam.png',
                'gambar_dewasa' => 'gerakan/dewasa/salam.png',
                'video_start_anak' => 622,  
                'video_start_dewasa' => 553, 

                'skip_start_anak' => 634,
                'skip_end_anak' => 639,
                'skip_start_dewasa' => 567,
                'skip_end_dewasa' => null,
            ],
        ];

        $modes = Mode::all();

        foreach ($modes as $mode) {
            foreach ($gerakans as $gerakan) {
                Gerakan::create([
                    'mode_id'            => $mode->id,
                    'nama_gerakan'       => $gerakan['nama_gerakan'],
                    'urutan'             => $gerakan['urutan'],
                    'deskripsi'          => $gerakan['deskripsi'],
                    'gambar_anak'        => $gerakan['gambar_anak'],
                    'gambar_dewasa'      => $gerakan['gambar_dewasa'],
                    'video_start_anak'   => $gerakan['video_start_anak'],
                    'video_start_dewasa' => $gerakan['video_start_dewasa'],
                    // Mendaftarkan kolom skip baru ke database
                    'skip_start_anak'    => $gerakan['skip_start_anak'],
                    'skip_end_anak'      => $gerakan['skip_end_anak'],
                    'skip_start_dewasa'  => $gerakan['skip_start_dewasa'],
                    'skip_end_dewasa'    => $gerakan['skip_end_dewasa'],
                ]);
            }
        }
    }
}