<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->query('type');

        $posts = Post::query()->type($type)->latest()->get();

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Post::class);

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Post::class);

        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'type' => 'required|in:' . implode(",", Post::$types),
            // 'images' => 'mimes:jpg,bmp,png',
            // 'videos' => 'mimes:avi,mpeg,mp4'
        ]);

        $createdPost = Post::create($validatedData);

        return redirect()->route('post.index')->with('success', 'Pomyślnie utworzono nowy post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', Post::class);

        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', Post::class);

        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'type' => 'required|in:' . implode(",", Post::$types),
            // 'images' => 'mimes:jpg,bmp,png',
            // 'videos' => 'mimes:avi,mpeg,mp4'
        ]);

        $post->update($validatedData);

        return redirect()->route('post.index')->with('success', 'Pomyślnie utworzono nowy post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
