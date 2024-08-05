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
        // $posts = Post::query()->with('views')->with()

        $visits = Visit::query()
            ->selectRaw('count(id) as count, month(created_at) as month')
            ->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()])
            ->groupBy('month')
            ->get();


        $visits = $visits->pluck('count')->toArray();

        // dd($visits);


        $visitsData = [
            'labels' => $months,
            'data' => $visits
        ];

        return view('dashboard.index', ['visitsData' => $visitsData]);
    }
}
