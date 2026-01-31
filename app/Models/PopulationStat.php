<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopulationStat extends Model
{
    protected $fillable = [
        'label',
        'count',
        'category',
    ];
}
