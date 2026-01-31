<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\VillageProfile;
use App\Models\VillageOfficial;
use App\Models\PopulationStat;
use App\Models\Aspiration;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $posts = Post::where('type', 'news')->latest()->take(3)->get();
        $agendas = Post::where('type', 'agenda')->latest()->take(3)->get();
        $profile = VillageProfile::first();
        
        // Only show key stats on home page
        $keyStats = ['Total Penduduk', 'Total Kepala Keluarga', 'Laki-laki', 'Perempuan'];
        $stats = PopulationStat::whereIn('label', $keyStats)
            ->get()
            ->sortBy(function($stat) use ($keyStats) {
                return array_search($stat->label, $keyStats);
            });
        
        return view('welcome', compact('posts', 'agendas', 'profile', 'stats'));
    }

    public function profile()
    {
        $profile = VillageProfile::first();
        return view('public.profile', compact('profile'));
    }

    public function government()
    {
        $officials = VillageOfficial::orderBy('order')->get();
        $profile = VillageProfile::first();
        return view('public.government', compact('officials', 'profile'));
    }

    public function posts(Request $request)
    {
        $type = $request->query('type', 'news');
        $posts = Post::where('type', $type)->latest()->paginate(9);
        return view('public.posts.index', compact('posts', 'type'));
    }

    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('public.posts.show', compact('post'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(16);
        return view('public.gallery', compact('galleries'));
    }

    public function contact()
    {
        $profile = VillageProfile::first();
        return view('public.contact', compact('profile'));
    }

    public function statistics()
    {
        $stats = PopulationStat::all();
        $profile = VillageProfile::first();
        
        // Categorize data for charts
        $genderData = $stats->where('category', 'Jenis Kelamin')->values();
        $ageData = $stats->where('category', 'Kelompok Umur')->values();
        $familyData = $stats->where('category', 'Kepala Keluarga')->values();
        $generalData = $stats->where('category', 'Umum')->values();

        return view('public.statistics', compact('genderData', 'ageData', 'familyData', 'generalData', 'profile'));
    }

    public function submitAspiration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Aspiration::create($validated);

        return redirect()->back()->with('success', 'Terima kasih, aspirasi Anda telah terkirim.');
    }
}
