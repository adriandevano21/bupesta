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
        Schema::create('analisis_triwulans', function (Blueprint $table) {
            $table->id();
            $table->string('idanalisis')->unique();
            $table->string('id_kinerja_bulanan');
            $table->string('periode');
            $table->string('analisis_triwulan');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_triwulans');
    }
};
