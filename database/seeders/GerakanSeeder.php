<?php

namespace Database\Seeders;

use App\Models\Gerakan;
use Illuminate\Database\Seeder;

class GerakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gerakans = [
            [
                'nama_gerakan' => 'Takbiratul Ihram',
                'urutan' => 1,
                'deskripsi' => 'Mengangkat kedua tangan sejajar telinga atau bahu sambil mengucapkan takbir.',
                'gambar_url' => 'gerakan/takbiratul_ihram.png',
                'video_url' => 'video/takbiratul_ihram.mp4',
            ],
            [
                'nama_gerakan' => 'Berdiri',
                'urutan' => 2,
                'deskripsi' => 'Berdiri tegak sambil membaca doa iftitah, Al-Fatihah, dan surat pendek.',
                'gambar_url' => 'gerakan/berdiri.png',
                'video_url' => 'video/berdiri.mp4',
            ],
            [
                'nama_gerakan' => "Ruku'",
                'urutan' => 3,
                'deskripsi' => 'Membungkukkan badan hingga punggung lurus dengan kedua tangan memegang lutut.',
                'gambar_url' => 'gerakan/ruku.png',
                'video_url' => 'video/ruku.mp4',
            ],
            [
                'nama_gerakan' => "I'tidal",
                'urutan' => 4,
                'deskripsi' => 'Bangkit dari ruku hingga berdiri tegak kembali.',
                'gambar_url' => 'gerakan/itidal.png',
                'video_url' => 'video/itidal.mp4',
            ],
            [
                'nama_gerakan' => 'Sujud Pertama',
                'urutan' => 5,
                'deskripsi' => 'Bersujud dengan tujuh anggota tubuh menyentuh tempat sujud.',
                'gambar_url' => 'gerakan/sujud_pertama.png',
                'video_url' => 'video/sujud_pertama.mp4',
            ],
            [
                'nama_gerakan' => 'Duduk di Antara Dua Sujud',
                'urutan' => 6,
                'deskripsi' => 'Duduk setelah sujud pertama sambil membaca doa.',
                'gambar_url' => 'gerakan/duduk_dua_sujud.png',
                'video_url' => 'video/duduk_dua_sujud.mp4',
            ],
            [
                'nama_gerakan' => 'Sujud Kedua',
                'urutan' => 7,
                'deskripsi' => 'Melakukan sujud kedua seperti sujud pertama.',
                'gambar_url' => 'gerakan/sujud_kedua.png',
                'video_url' => 'video/sujud_kedua.mp4',
            ],
            [
                'nama_gerakan' => 'Tasyahud Awal',
                'urutan' => 8,
                'deskripsi' => 'Duduk tasyahud pada rakaat kedua.',
                'gambar_url' => 'gerakan/tasyahud_awal.png',
                'video_url' => 'video/tasyahud_awal.mp4',
            ],
            [
                'nama_gerakan' => 'Tasyahud Akhir',
                'urutan' => 9,
                'deskripsi' => 'Duduk tasyahud terakhir sebelum salam.',
                'gambar_url' => 'gerakan/tasyahud_akhir.png',
                'video_url' => 'video/tasyahud_akhir.mp4',
            ],
            [
                'nama_gerakan' => 'Salam',
                'urutan' => 10,
                'deskripsi' => 'Menoleh ke kanan dan ke kiri sebagai penutup sholat.',
                'gambar_url' => 'gerakan/salam.png',
                'video_url' => 'video/salam.mp4',
            ],
        ];

        foreach ($gerakans as $gerakan) {
            Gerakan::create($gerakan);
        }
    }
}