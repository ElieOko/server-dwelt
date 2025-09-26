<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = [
        'name',
        'country_id',
        'is_active'
    ];

    public function property()
    {
        return $this->hasMany(Property::class, 'cityId', 'id');
    }
}
