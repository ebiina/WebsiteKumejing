<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->image)) {
            return '/storage/' . $this->image;
        }
        return '/assets/' . $this->image;
    }
}
