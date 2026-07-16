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
        Schema::table('gerakans', function (Blueprint $table) {
            // Menambahkan 4 kolom baru untuk mengatur skip video
            $table->integer('skip_start_anak')->nullable()->after('video_start_dewasa');
            $table->integer('skip_end_anak')->nullable()->after('skip_start_anak');
            $table->integer('skip_start_dewasa')->nullable()->after('skip_end_anak');
            $table->integer('skip_end_dewasa')->nullable()->after('skip_start_dewasa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gerakans', function (Blueprint $table) {
            // Menghapus kembali kolom jika migrasi di-rollback
            $table->dropColumn([
                'skip_start_anak',
                'skip_end_anak',
                'skip_start_dewasa',
                'skip_end_dewasa'
            ]);
        });
    }
};