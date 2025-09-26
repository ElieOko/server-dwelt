<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

class ImageProperty extends Model
{
    //

    protected $fillable = [
        'maison_id',
        'nom',
        'path',
        'is_active'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
