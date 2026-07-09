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
        
    Schema::create('gerakans', function (Blueprint $table) {
    $table->id();

    $table->foreignId('mode_id')
          ->constrained('modes')
          ->cascadeOnUpdate()
          ->cascadeOnDelete();

    $table->string('nama_gerakan',100);
    $table->string('subjudul',100)->nullable();
    $table->smallInteger('urutan');

    $table->text('deskripsi')->nullable();

    $table->string('gambar_url')->nullable();
    $table->string('video_url')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerakans');
    }
};
