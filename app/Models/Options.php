<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Options extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_group', 'option_name', 'type'
    ];

    public function JalurQuotas(): HasMany
    {
        return $this->hasMany(AdmissionQuotas::class);
    }
    public function JurusanQuotas(): HasMany
    {
        return $this->hasMany(AdmissionQuotas::class);
    }
    public function Jurusan(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function Jalur(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function Tinggal(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function Transpotasi(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function Agama(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function KebutuhanKhusus(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function Pendidikan(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function Pekerjaan(): HasMany
    {
        return $this->hasMany(Students::class);
    }
    public function Penghasilan(): HasMany
    {
        return $this->hasMany(Students::class);
    }
}
