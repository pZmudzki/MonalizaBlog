<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\View;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterPostView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()) {
            return $next($request);
        }

        $post = $request->route()->parameter('post');

        $visit_id = $request->session()->get('current_visit');

        $viewed_during_visit = View::where('post_id', '=', $post->id)
            ->where('visit_id', '=', $visit_id)
            ->exists();

        if ($viewed_during_visit) {
            return $next($request);
        }

        $post->views()->create([
            'visit_id' => $visit_id,
        ]);

        return $next($request);
    }
}
