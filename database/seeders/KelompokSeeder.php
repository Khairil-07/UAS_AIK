<?php

namespace Database\Seeders;

use App\Models\Kelompok;
use Illuminate\Database\Seeder;

class KelompokSeeder extends Seeder
{
    public function run(): void
    {
    Kelompok::create([
    'nama_kelompok' => 'Kelompok 4',
    'prodi' => 'Sistem Informasi',
    'mata_kuliah' => 'Pengembangan Aplikasi Web',
    'dosen' => 'Nama Dosen',
]);
    }
}