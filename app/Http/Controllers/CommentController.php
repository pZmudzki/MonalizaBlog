<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        $comment_exists = Comment::where('post_id', '=', $post_id)
            ->where('visit_id', '=', $visit_id)
            ->exists();

        if ($comment_exists) {
            return redirect()->route('post.show', $post_id)->with(['error', 'Pod każdym postem można dodać tylko po jednym komentarzu na użytkownika']);
        }

        Post::find($post_id)->comments()->create([
            ...$validatedData,
            'visit_id' => $visit_id
        ]);

        return redirect()->route('post.show', $post_id)->with(['success', 'Pomyślnie dodano komentarz!']);
    }

    /**
     * Highlight a comment by giving it a star.
     */
    public function highlight(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
