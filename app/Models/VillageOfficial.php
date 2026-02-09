<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageOfficial extends Model
{
    protected $fillable = [
        'name',
        'position',
        'photo',
        'order',
    ];

    public function getPhotoUrlAttribute()
    {
        if ($this->photo && file_exists(public_path('assets/' . $this->photo))) {
            return '/assets/' . $this->photo;
        }
        return '/storage/' . $this->photo;
    }
}
