<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_pendaftaran',
        'jalur_pendaftaran_id',
        'no_pendaftaran',
        'hasil_seleksi_pmb',
        'jurusan_satu_id',
        'jurusan_dua_id',
        'registrasi_ulang',
        'no_ijazah',
        'asal_sekolah',
        'alamat_asal_sekolah',
        'hobi',
        'cita_cita',
        'nama',
        'jenis_kelamin',
        'nik',
        'no_kk',
        'nis',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'agama_id',
        'kebutuhan_khusus_id',
        'alamat',
        'desa',
        'kecamatan',
        'kota_kabupaten',
        'kode_pos',
        'tempat_tinggal_id',
        'moda_transportasi_id',
        'no_hp',
        'no_hp_ortu',
        'email',
        'sktm',
        'kip',
        'kewarganegaraan',
        'anak_ke',
        'nama_ayah',
        'nik_ayah',
        'ayah_tanggal_lahir',
        'ayah_pendidikan_id',
        'ayah_pekerjaan_id',
        'ayah_penghasilan_id',
        'nama_ibu',
        'nik_ibu',
        'ibu_tanggal_lahir',
        'ibu_pendidikan_id',
        'ibu_pekerjaan_id',
        'ibu_penghasilan_id',
        'nama_wali',
        'nik_wali',
        'wali_tanggal_lahir',
        'wali_pendidikan_id',
        'wali_pekerjaan_id',
        'wali_penghasilan_id',
        'tinggi_badan',
        'berat_badan',
        'lingkar_kepala',
        'jarak_tempat_tinggal',
        'waktu_tempuh_sekolah',
        'jumlah_saudara_kandung',

    ];
    public function TahunAjaran(): BelongsTo
    {
        return $this->belongsTo(AcademicYears::class);
    }

    public function JalurPendaftaran(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function JurusanSatu(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function JurusanDua(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function Agama(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function KebutuhanKhusus(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function ModaTransportasi(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function TempatTinggal(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function AyahPendidikan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function IbuPendidikan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function WaliPendidikan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function AyahPekerjaan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function IbuPekerjaan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function WaliPekerjaan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function AyahPenghasilan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function IbuPenghasilan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function WaliPenghasilan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
}
