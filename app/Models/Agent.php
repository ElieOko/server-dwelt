<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //
    protected $fillable = [
        'nom',
        'role',
        'description',
        'phone',
        'email',
        'image',
    ];
}
