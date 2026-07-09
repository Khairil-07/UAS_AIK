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
        Schema::create('bacaans', function (Blueprint $table) {
    $table->id();

    $table->foreignId('gerakan_id')
          ->constrained('gerakans')
          ->cascadeOnUpdate()
          ->cascadeOnDelete();

    $table->smallInteger('urutan')->default(1);

    $table->text('teks_arab');
    $table->text('teks_latin');
    $table->text('terjemahan');

    $table->string('audio_url')->nullable();
    $table->string('sumber',150)->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bacaans');
    }
};
