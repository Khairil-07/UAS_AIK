<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gerakans', function (Blueprint $table) {

            $table->dropColumn('video_start');

            $table->integer('video_start_dewasa')->default(0);

            $table->integer('video_start_anak')->default(0);

        });
    }

    public function down(): void
    {
        Schema::table('gerakans', function (Blueprint $table) {

            $table->dropColumn([
                'video_start_dewasa',
                'video_start_anak',
            ]);

            $table->integer('video_start')->default(0);

        });
    }
};