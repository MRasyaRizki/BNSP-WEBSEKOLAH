<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Activity;

class AdminController extends Controller
{
    public function index()
    {
        $newsCount = News::count();
        $activitiesCount = Activity::count();

        // Ambil data terbaru untuk tabel (misal 10 item terakhir)
        $news = News::latest()->paginate(10);
        $activities = Activity::latest()->paginate(10);

        return view('admin.dashboard', compact(
            'newsCount',
            'activitiesCount',
            'news',
            'activities'
        ));
    }
}
