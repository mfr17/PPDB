<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYears extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun_ajaran', 'semester', 'aktif', 'tahun_pendaftaran'
    ];
    protected $casts = [
        'aktif' => 'boolean',
        'tahun_pendaftaran' => 'boolean',
    ];
    public function admissionQuotas(): HasMany
    {
        return $this->hasMany(AdmissionQuotas::class);
    }
}
