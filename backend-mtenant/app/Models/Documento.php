<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documento extends Model
{
    protected $fillable = [
        'tenant_id',
        'titulo',
        'descripcion',
        'url',
        'categoria',
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    protected $appends = [
        'archivo_url',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function getArchivoUrlAttribute(): ?string
    {
        return $this->url ? asset('storage/' . $this->url) : null;
    }
}
