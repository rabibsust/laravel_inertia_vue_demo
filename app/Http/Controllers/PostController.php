<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Post::class);
        $posts = auth()->user()->posts;
        return Inertia::render('Post/Index', ['posts' => $posts]);
    }

    public function create()
    {
        Gate::authorize('create', Post::class);
        return Inertia::render('Post/Create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Post::class);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $post = auth()->user()->posts()->create($validated);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->back();
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return Inertia::render('Post/Create', ['post' => $post, 'isUpdating' => true]);
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        
        $post->update($validated);
        return redirect()->route('posts.index');
    }

}
