<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $fillable = [
        'nama_kelompok',
        'prodi',
        'mata_kuliah',
        'dosen',
    ];
}