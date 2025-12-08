<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    protected $fillable = [
        'nombre',
        'subdomain',
        'logo',
        'banner',
        'color_primario',
        'color_secundario',
        'color_acento',
        'menu',
        'presentacion_titulo',
        'presentacion_texto',
        'ofrecemos',
        'historia',
        'mision',
        'vision',
        'organigrama',
        'email',
        'telefono',
        'direccion',
        'redes_sociales',
        'activo',
    ];

    protected $casts = [
        'menu' => 'array',
        'ofrecemos' => 'array',
        'redes_sociales' => 'array',
        'activo' => 'boolean',
    ];

    protected $appends = [
        'logo_url',
        'banner_url',
        'organigrama_url',
    ];

    // Relaciones
    public function programas(): HasMany
    {
        return $this->hasMany(Programa::class)->orderBy('orden');
    }

    public function autoridades(): HasMany
    {
        return $this->hasMany(Autoridad::class)->orderBy('orden');
    }

    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class);
    }

    // Accessors para URLs completas
    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    public function getBannerUrlAttribute(): ?string
    {
        return $this->banner ? asset('storage/' . $this->banner) : null;
    }

    public function getOrganigramaUrlAttribute(): ?string
    {
        return $this->organigrama ? asset('storage/' . $this->organigrama) : null;
    }
}
