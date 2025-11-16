<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Programa extends Model
{
    protected $fillable = [
        'tenant_id',
        'nombre',
        'descripcion',
        'perfil_egresado',
        'campo_laboral',
        'duracion',
        'malla_curricular',
        'orden',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function getMallaCurricularUrlAttribute(): ?string
    {
        return $this->malla_curricular ? asset('storage/' . $this->malla_curricular) : null;
    }
}
