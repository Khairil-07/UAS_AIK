<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bacaan extends Model
{
    protected $fillable = [
        'gerakan_id',
        'urutan',
        'teks_arab',
        'teks_latin',
        'terjemahan',
        'audio_url',
        'audio_indonesia',
        'sumber',
    ];

    public function gerakan(): BelongsTo
    {
        return $this->belongsTo(Gerakan::class);
    }
}