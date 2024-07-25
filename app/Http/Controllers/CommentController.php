<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|min:2|max:255',
            'lastname' => 'required|min:2|max:255',
            'email' => 'required|email',
            'content' => 'required|min:5'
        ]);

        $post_id = $request->query('post');

        $visit_id = $request->session()->get('current_visit');

        Post::find($post_id)->comments()->create([
            ...$validatedData,
            'visit_id' => $visit_id
        ]);

        return redirect()->back()->with(['success', 'Pomyślnie dodano komentarz!']);
    }

    /**
     * Highlight a comment by giving it a star.
     */
    public function highlight(Request $request, Comment $comment)
    {
        Gate::authorize('update', Comment::class);

        $comment->update([
            'starred' => !$comment->starred,
        ]);

        return redirect()->back()->with(['success', 'Pomyślnie dodano gwiazdkę do komentarza!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', Comment::class);
    }
}
