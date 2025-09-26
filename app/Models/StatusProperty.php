<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

class StatusProperty extends Model
{
    //
    protected $fillable = [
        'name',
        'is_active'
    ];
    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
