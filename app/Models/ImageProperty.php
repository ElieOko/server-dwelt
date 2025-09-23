<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProperty extends Model
{
    //

    protected $fillable = [
        'maison_id',
        'nom',
        'path'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
