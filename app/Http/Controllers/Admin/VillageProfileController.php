<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;

class VillageProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = VillageProfile::firstOrCreate(['id' => 1], [
            'history' => 'Sejarah Desa...',
            'vision' => 'Visi Desa...',
            'mission' => 'Misi Desa...',
        ]);
        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VillageProfile $profile)
    {
        $validated = $request->validate([
            'history' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'location_map' => 'nullable|string',
            'structure_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('structure_image')) {
            $path = $request->file('structure_image')->store('profile', 'public');
            $validated['structure_image'] = $path;
        }

        $profile->update($validated);

        return redirect()->route('admin.profile.index')->with('success', 'Profil desa berhasil diperbarui.');
    }
}
