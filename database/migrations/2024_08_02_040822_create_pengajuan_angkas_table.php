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
        Schema::create('pengajuan_angkas', function (Blueprint $table) {
            $table->id();
            $table->string('id_kinerja_bulanan');
            $table->string('periode');
            $table->decimal('realisasi', total: 10, places: 2);
            $table->string('buktidukung');
            $table->string('status');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_angkas');
    }
};
