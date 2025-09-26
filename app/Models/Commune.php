<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //
    protected $fillable = [
        'name',
        "city_id",
        'is_active'
    ];
    public function property()
    {
        return $this->hasMany(Property::class, 'communeId', 'id');
    }
}
