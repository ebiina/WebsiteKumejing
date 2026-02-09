<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'type',
        'event_date',
    ];

    protected $casts = [
        'event_date' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = \Illuminate\Support\Str::slug($post->title) . '-' . uniqid();
            }
        });
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->image)) {
            return '/storage/' . $this->image;
        }
        return '/assets/' . $this->image;
    }
}
