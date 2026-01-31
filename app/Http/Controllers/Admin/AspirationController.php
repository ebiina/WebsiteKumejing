<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aspirations = Aspiration::latest()->paginate(20);
        return view('admin.aspirations.index', compact('aspirations'));
    }

    public function show(Aspiration $aspiration)
    {
        return view('admin.aspirations.show', compact('aspiration'));
    }

    public function update(Request $request, Aspiration $aspiration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,hidden',
        ]);

        $aspiration->update($validated);

        return redirect()->route('admin.aspirations.index')->with('success', 'Status aspirasi berhasil diperbarui.');
    }

    public function destroy(Aspiration $aspiration)
    {
        $aspiration->delete();
        return redirect()->route('admin.aspirations.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
