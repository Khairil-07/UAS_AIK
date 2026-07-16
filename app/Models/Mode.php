<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mode extends Model
{
    protected $fillable = [
        'nama_mode',
        'deskripsi',
        'video_url',
    ];

    public function gerakans(): HasMany
    {
        return $this->hasMany(Gerakan::class);
    }
}