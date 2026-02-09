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
        if ($this->structure_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->structure_image)) {
            return asset('storage/' . $this->structure_image);
        }
        return asset('assets/' . $this->structure_image);
    }
}
