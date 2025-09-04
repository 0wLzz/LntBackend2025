<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(8);

        return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Post.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $credentials = $request->validate([
            'title' => 'required|max:20|string',
            'body' => 'required'
        ]);

        // Post::create($credentials);
        Auth::user()->post()->create($credentials);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update-posts', $post);
        return view('Post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $credentials = $request->validate([
            'title' => 'required|max:20|string',
            'body' => 'required'
        ]);

        $post->update($credentials);

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete-posts', $post);
        $post->delete();

        return to_route('posts.index');
    }
}
