<?php

namespace App\Models;

use App\Models\Property;
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
        'path',
        'is_active'
    ];
    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
