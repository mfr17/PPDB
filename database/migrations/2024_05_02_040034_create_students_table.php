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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_pendaftaran', ['Baru', 'Pindahan'])->comment('Jenis pendaftaran (Baru/Pindahan)');
            $table->integer('jalur_pendaftaran_id')->comment('Jalur pendaftaran (Umum/Prestasi)');
            $table->string('no_pendaftaran')->comment('Nomor Pendaftaran');
            $table->string('hasil_seleksi_pmb')->nullable()->comment('Hasil seleksi PMB');
            $table->bigInteger('jurusan_satu_id')->comment('Jurusan 1 Siswa');
            $table->bigInteger('jurusan_dua_id')->comment('Jurusan 2 Siswa');
            $table->enum('registrasi_ulang', ['Ya', 'Tidak'])->nullable()->comment('Konfirmasi pendaftaran ulang');
            $table->string('no_ijazah')->nullable()->comment('Nomor Ijazah sebelumnya');
            $table->string('asal_sekolah')->nullable()->comment('Asal sekolah');
            $table->string('alamat_asal_sekolah')->nullable()->comment('Alamat sekolah');
            $table->string('hobi')->nullable()->comment('Hobi');
            $table->string('cita_cita')->nullable()->comment('Cita-Cita');

            // Data Pribadi
            $table->string('nama')->comment('Nama lengkap siswa');
            $table->enum('jenis_kelamin', ['L', 'P'])->comment('Jenis kelamin siswa (L/P)');
            $table->string('nik')->unique()->comment('Nomor Induk Kependudukan');
            $table->string('nis')->nullable()->comment('Nomor Induk Siswa');
            $table->string('nisn')->nullable()->comment('Nomor Induk Siswa Nasional');
            $table->string('tempat_lahir')->comment('Tempat lahir siswa');
            $table->date('tanggal_lahir')->comment('Tanggal lahir siswa');
            $table->integer('agama_id')->comment('Agama siswa');
            $table->integer('kebutuhan_khusus_id')->nullable()->comment('Kebutuhan khusus siswa');
            $table->string('alamat')->comment('Alamat tempat tinggal lengkap');
            $table->string('desa')->comment('Nama desa tempat tinggal');
            $table->string('kecamatan')->comment('Nama kecamatan tempat tinggal');
            $table->string('kota_kabupaten')->comment('Nama kota/kabupaten tempat tinggal');
            $table->integer('kode_pos')->limit(5)->comment('Kode pos tempat tinggal');
            $table->integer('tempat_tinggal_id')->comment('Jenis tempat tinggal');
            $table->integer('moda_transportasi_id')->comment('Moda transportasi yang digunakan');
            $table->string('no_hp')->comment('Nomor HP/WA siswa');
            $table->string('no_hp_ortu')->comment('Nomor HP/WA ortu');
            $table->string('email')->nullable()->comment('Email pribadi siswa');
            $table->string('sktm')->nullable()->comment('Nomor Surat Keterangan Tidak Mampu');
            $table->string('kip')->nullable()->comment('Nomor Kartu Indonesia Pintar');
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->comment('Kewarganegaraan siswa');
            // Data Ayah Kandung
            $table->string('nama_ayah')->comment('Nama Ayah');
            $table->date('ayah_tanggal_lahir')->nullable()->comment('Tanggal lahir ayah');
            $table->string('alamat_ayah')->nullable()->comment('Alamat Ayah');
            $table->integer('ayah_pendidikan_id')->nullable()->comment('Pendidikan terakhir ayah');
            $table->integer('ayah_pekerjaan_id')->nullable()->comment('Pekerjaan ayah');
            $table->integer('ayah_penghasilan_id')->nullable()->comment('Rentang penghasilan ayah');
            // Data Ibu Kandung
            $table->string('nama_ibu')->comment('Nama Ibu');
            $table->string('alamat_ibu')->nullable()->comment('Alamat Ibu');
            $table->date('ibu_tanggal_lahir')->nullable()->comment('Tanggal lahir ibu');
            $table->integer('ibu_pendidikan_id')->nullable()->comment('Pendidikan terakhir ibu');
            $table->integer('ibu_pekerjaan_id')->nullable()->comment('Pekerjaan ibu');
            $table->integer('ibu_penghasilan_id')->nullable()->comment('Rentang penghasilan ibu');
            // Data Wali
            $table->string('nama_wali')->nullable()->comment('Nama Wali');
            $table->string('alamat_wali')->nullable()->comment('Alamat Wali');
            $table->date('wali_tanggal_lahir')->nullable()->comment('Tanggal lahir wali');
            $table->integer('wali_pendidikan_id')->nullable()->comment('Pendidikan terakhir wali');
            $table->integer('wali_pekerjaan_id')->nullable()->comment('Pekerjaan wali');
            $table->integer('wali_penghasilan_id')->nullable()->comment('Rentang penghasilan wali');
            // Data Periodik
            $table->smallInteger('tinggi_badan')->comment('Tinggi badan siswa (cm)');
            $table->smallInteger('berat_badan')->comment('Berat badan siswa (kg)');
            $table->smallInteger('jarak_tempat_tinggal')->comment('Jarak tempat tinggal ke sekolah (km)');
            $table->smallInteger('waktu_tempuh_sekolah')->comment('Waktu tempuh ke sekolah (menit)');
            $table->smallInteger('jumlah_saudara_kandung')->comment('Jumlah saudara kandung');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
