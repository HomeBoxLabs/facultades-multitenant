<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Autoridad extends Model
{
    protected $table = 'autoridades';

    protected $fillable = [
        'tenant_id',
        'cargo',
        'nombre',
        'email',
        'telefono',
        'foto',
        'oficina',
        'orden',
    ];

    protected $appends = [
        'foto_url',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }
}
