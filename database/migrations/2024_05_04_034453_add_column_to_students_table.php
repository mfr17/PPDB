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
        Schema::table('students', function (Blueprint $table) {
            $table->bigInteger('no_kk')->nullable()->after('nik');
            $table->bigInteger('nik_ayah')->nullable()->after('nama_ayah');
            $table->bigInteger('nik_ibu')->nullable()->after('nama_ibu');
            $table->bigInteger('nik_wali')->nullable()->after('nama_wali');
            $table->smallInteger('lingkar_kepala')->nullable()->after('berat_badan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
