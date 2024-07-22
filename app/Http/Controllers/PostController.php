<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

use App\Models\Image;
use App\Models\Video;

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
            'images.*' => 'mimes:jpg,bmp,png,webp|max:4096',
            'videos.*' => 'mimes:avi,mpeg,mp4|max:16384'
        ]);

        $createdPost = Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'type' => $validatedData['type'],
        ]);

        $images = $request->file('images');
        if ($validatedData['images']) {
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $path = $image->store('images', 'public');
                $createdPost->images()->create([
                    'filename' => $name,
                    'filepath' => $path
                ]);
            }
        }

        $videos = $request->file('videos');
        if ($validatedData['videos']) {
            foreach ($videos as $video) {
                $name = $video->getClientOriginalName();
                $path = $video->store('videos', 'public');
                $createdPost->videos()->create([
                    'filename' => $name,
                    'filepath' => $path
                ]);
            }
        }

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
            'images.*' => 'mimes:jpg,bmp,png,webp|max:4096',
            'videos.*' => 'mimes:avi,mpeg,mp4|max:16384',
            'deleteImages' => 'array',
            'deleteVideos' => 'array',
        ]);

        //image deletion logic
        if (array_key_exists('deleteImages', $validatedData)) {
            foreach ($validatedData['deleteImages'] as $imageId) {

                // find an image
                $image = Image::find($imageId);

                if (Storage::exists('public/' . $image->filepath)) {
                    // // delete image from storage
                    Storage::delete('public/' . $image->filepath);

                    // //delete image from db
                    $image->delete();
                }
            }
        }


        // video deletion logic
        if (array_key_exists('deleteVideos', $validatedData)) {
            foreach ($validatedData['deleteVideos'] as $videoId) {

                // find an image
                $video = Video::find($videoId);

                if (Storage::exists('public/' . $video->filepath)) {
                    // // delete image from storage
                    Storage::delete('public/' . $video->filepath);

                    // //delete image from db
                    $video->delete();
                }
            }
        }

        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $path = $image->store('images', 'public');
                $post->images()->create([
                    'filename' => $name,
                    'filepath' => $path
                ]);
            }
        }

        $videos = $request->file('videos');
        if ($videos) {
            foreach ($videos as $video) {
                $name = $video->getClientOriginalName();
                $path = $video->store('videos', 'public');
                $post->videos()->create([
                    'filename' => $name,
                    'filepath' => $path
                ]);
            }
        }

        $post->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'type' => $validatedData['type'],
        ]);

        return redirect()->route('post.edit', ['post' => $post])->with('success', 'Pomyślnie edytowano post.');
    }

    public function archive(Post $post)
    {
        Gate::authorize('update', Post::class);

        $archived = $post->archived;

        $post->update([
            'archived' => !$archived,
        ]);

        return redirect()->route('post.edit', ['post' => $post])->with('success', 'Pomyślnie zarchiwizowano post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('update', Post::class);

        $post->delete();

        return redirect()->route('post.index')->with('success', 'Pomyślnie usunięto post');
    }
}
