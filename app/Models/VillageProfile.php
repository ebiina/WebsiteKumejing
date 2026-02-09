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

    public function getStructureImageUrlAttribute()
    {
        if ($this->structure_image && file_exists(public_path('assets/' . $this->structure_image))) {
            return '/assets/' . $this->structure_image;
        }
        return '/storage/' . $this->structure_image;
    }
}
