<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    //
    protected $fillable = [
        "type_demande",
        "me",
        "lastname",
        "firstname",
        "email",
        "city",
        "code_postal",
        "type_bien",
        "price_max",
        "room",
        "surface",
        "salle_bain",
        "description",
        "is_allow",
    ];
}
