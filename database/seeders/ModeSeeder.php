<?php

namespace Database\Seeders;

use App\Models\Mode;
use Illuminate\Database\Seeder;

class ModeSeeder extends Seeder
{
    public function run(): void
    {
        Mode::insert([
            [
                'nama_mode' => 'Dewasa',
                'deskripsi' => 'Mode pembelajaran untuk pengguna dewasa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_mode' => 'Anak-anak',
                'deskripsi' => 'Mode pembelajaran untuk anak-anak.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}