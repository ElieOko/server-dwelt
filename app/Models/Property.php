<?php

namespace App\Models;

use App\Models\ImageProperty;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
        'nom',
        // 'piece',
        'caracteristique',
        'measure',
        'agentId',
        'cityId',
        'communeId',
        'propertyId',
        'statusPropertyId',
        'isDisponible',
        'superficie',
        'prix',
        'partPayed',
        'countryId',
        'codePostal',
        'salleBain',
        'cuisine',
        'garage',
        'chambre'
    ];

    protected $casts = [
        'caracteristique' => 'array',
        'isDisponible' => 'boolean',
        'prix' => 'decimal:2'
    ];

    public function images()
    {
        return $this->hasMany(ImageProperty::class, 'maison_id', 'id');
    }
}
