<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyVisit extends Model
{
    //
    protected $fillable = [
        'maison_id',
        'type_visite',
        'date',
        'heure',
        'nom_complet',
        'telephone',
        'message',
    ];


    public function property()
    {
        return $this->belongsTo(Property::class, "maison_id", "id");
    }
}
