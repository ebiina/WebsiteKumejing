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
        if ($this->photo && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->photo)) {
            return '/storage/' . $this->photo;
        }
        return '/assets/' . $this->photo;
    }
}
