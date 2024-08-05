<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\View;
use App\Models\Visit;
use App\Models\Post;
use App\Models\Comments;

class DashboardController extends Controller
{
    public function index()
    {

        $months = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];

        $visits = Visit::query()
            ->selectRaw('count(id) as count, month(created_at) as month')
            ->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()])
            ->groupBy('month')
            ->get();

        $visits = $visits->pluck('count')->toArray();


        $visitsData = [
            'labels' => $months,
            'data' => $visits
        ];

        return view('dashboard.index', ['visitsData' => $visitsData]);
    }

    public function posts(Request $request)
    {
        $posts = Post::query()
            ->type($request->query('type'))
            ->titleOrContent($request->query('search'))
            ->sortBy($request->query('sort'))
            ->withCount('comments')
            ->withCount('views')
            ->get();

        return view('dashboard.posts', ['posts' => $posts]);
    }
}
