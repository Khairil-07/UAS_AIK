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

        if (!Schema::hasColumn('gerakans', 'gambar_anak')) {
            $table->string('gambar_anak')
                ->nullable()
                ->after('deskripsi');
        }

        if (!Schema::hasColumn('gerakans', 'gambar_dewasa')) {
            $table->string('gambar_dewasa')
                ->nullable()
                ->after('gambar_anak');
        }

    });
}


    public function down(): void
    {
        Schema::table('gerakans', function (Blueprint $table) {

            $table->dropColumn([
                'gambar_anak',
                'gambar_dewasa'
            ]);

        });
    }
};
