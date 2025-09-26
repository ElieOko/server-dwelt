<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    //
    protected $fillable = [
        "name",
        'is_active'
    ];
}
