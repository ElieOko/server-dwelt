<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicite extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'image',
        'path',
        'is_active'
    ];
}
