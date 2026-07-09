<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
        $table->id();

        $table->foreignId('gerakan_id')
              ->constrained('gerakans')
              ->cascadeOnUpdate()
              ->cascadeOnDelete();

        $table->enum('tipe', ['audio', 'video']);
        $table->string('judul', 100);
        $table->string('file_media');
        $table->string('durasi', 20)->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
