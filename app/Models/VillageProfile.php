<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'history',
        'vision',
        'mission',
        'structure_image',
        'location_map',
    ];
}
