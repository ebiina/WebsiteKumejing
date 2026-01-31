<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageOfficial;
use Illuminate\Http\Request;

class VillageOfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officials = VillageOfficial::orderBy('order')->get();
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('officials', 'public');
        }

        VillageOfficial::create($validated);

        return redirect()->route('admin.officials.index')->with('success', 'Perangkat desa berhasil ditambahkan.');
    }

    public function edit(VillageOfficial $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, VillageOfficial $official)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('officials', 'public');
        }

        $official->update($validated);

        return redirect()->route('admin.officials.index')->with('success', 'Data perangkat desa berhasil diperbarui.');
    }

    public function destroy(VillageOfficial $official)
    {
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Perangkat desa berhasil dihapus.');
    }
}
