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
        Schema::create('admission_quotas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tahun_ajaran_id')->nullable();
            $table->bigInteger('jalur_pendaftaran_id')->nullable();
            $table->bigInteger('jurusan_id')->nullable();
            $table->smallInteger('kuota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_quotas');
    }
};
