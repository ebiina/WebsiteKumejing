<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopulationStat;
use Illuminate\Http\Request;

class PopulationStatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stats = PopulationStat::all();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
        ]);

        PopulationStat::create($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Data statistik berhasil ditambahkan.');
    }

    public function edit(PopulationStat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, PopulationStat $stat)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
        ]);

        $stat->update($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Data statistik berhasil diperbarui.');
    }

    public function destroy(PopulationStat $stat)
    {
        $stat->delete();
        return redirect()->route('admin.stats.index')->with('success', 'Data statistik berhasil dihapus.');
    }
}
