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
}
