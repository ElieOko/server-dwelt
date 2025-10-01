<?php

namespace App\Models;

use App\Models\City;
use App\Models\Agent;
use App\Models\Commune;
use App\Models\Country;
use App\Models\TypeProperty;
use App\Models\ImageProperty;
use App\Models\PropertyVisit;
use App\Models\StatusProperty;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
        'nom',
        'caracteristique',
        'measure',
        'agentId',
        'cityId',
        'communeId',
        'propertyTypeId',
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
        'chambre',
        'is_active'

    ];

    protected $casts = [
        'caracteristique' => 'array',
        'isDisponible' => 'boolean',
        'prix' => 'decimal:2'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, "cityId", "id");
    }
    public function type_property()
    {
        return $this->belongsTo(TypeProperty::class, "propertyTypeId", "id");
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, "agentId", "id");
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class, "communeId", "id");
    }
    public function status_property()
    {
        return $this->belongsTo(StatusProperty::class, "statusPropertyId", "id");
    }
    public function country()
    {
        return $this->belongsTo(Country::class, "countryId", "id");
    }

    public function images()
    {
        return $this->hasMany(ImageProperty::class, 'maison_id', 'id');
    }

    public function property_visit()
    {
        return $this->hasMany(PropertyVisit::class, 'maison_id', 'id');
    }
}
