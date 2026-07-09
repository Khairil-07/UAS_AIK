<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gerakan extends Model
{
    protected $fillable = [
        'mode_id',
        'nama_gerakan',
        'urutan',
        'deskripsi',
        'gambar_url',
        'video_url',
    ];

    public function bacaans(): HasMany
    {
        return $this->hasMany(Bacaan::class);
    }
}