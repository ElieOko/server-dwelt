<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaracteristiqueMaison extends Model
{
    //
    protected $fillable = [
        "maison_id",
        "caracteristique_id",
    ];
}
