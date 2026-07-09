<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bacaans', function (Blueprint $table) {
            $table->string('audio_indonesia')->nullable()->after('audio_url');
        });
    }

    public function down(): void
    {
        Schema::table('bacaans', function (Blueprint $table) {
            $table->dropColumn('audio_indonesia');
        });
    }
};