<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => \App\Models\Post::count(),
            'total_officials' => \App\Models\VillageOfficial::count(),
            'total_galleries' => \App\Models\Gallery::count(),
            'total_aspirations' => \App\Models\Aspiration::where('status', 'pending')->count(),
            'population_stats' => \App\Models\PopulationStat::all(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
