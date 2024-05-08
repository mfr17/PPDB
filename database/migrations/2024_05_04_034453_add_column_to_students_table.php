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
            $table->string('no_kk')->nullable()->after('nik');
            $table->string('nik_ayah')->nullable()->after('nama_ayah');
            $table->string('nik_ibu')->nullable()->after('nama_ibu');
            $table->string('nik_wali')->nullable()->after('nama_wali');
            $table->smallInteger('lingkar_kepala')->nullable()->after('berat_badan');
            $table->smallInteger('anak_ke')->nullable()->after('kewarganegaraan');
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
