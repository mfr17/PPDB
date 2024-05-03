<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdmissionQuotas extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun_ajaran_id',
        'jalur_pendaftaran_id',
        'jurusan_id',
        'kuota'
    ];

    public function TahunAjaran(): BelongsTo
    {
        return $this->belongsTo(AcademicYears::class);
    }

    public function JalurPendaftaran(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
    public function Jurusan(): BelongsTo
    {
        return $this->belongsTo(Options::class);
    }
}
