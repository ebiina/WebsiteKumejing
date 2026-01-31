<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->query('type', 'news');
        $posts = Post::where('type', $type)->latest()->paginate(10);
        return view('admin.posts.index', compact('posts', 'type'));
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'news');
        return view('admin.posts.create', compact('type'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:news,agenda',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|required_if:type,agenda|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index', ['type' => $request->type])
                         ->with('success', 'Post berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        $type = $post->type;
        return view('admin.posts.edit', compact('post', 'type'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:news,agenda',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'nullable|required_if:type,agenda|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index', ['type' => $request->type])
                         ->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $type = $post->type;
        $post->delete();
        return redirect()->route('admin.posts.index', ['type' => $type])
                         ->with('success', 'Post berhasil dihapus.');
    }
}
