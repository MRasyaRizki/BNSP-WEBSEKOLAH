<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Activity;

class PageController extends Controller
{
    // Halaman Home
    public function home()
    {
        $activities = Activity::latest()->take(6)->get(); // ambil 6 kegiatan terbaru
        $news       = News::latest()->take(6)->get();     // ambil 6 berita terbaru

        return view('layouts.home', compact('activities', 'news'));
    }

    // Halaman Tentang Kami
    public function about()
    {
        return view('layouts.about');
    }

    // Halaman Kegiatan
    public function activities()
    {
        return view(view: 'layouts.activities');
    }

    // Halaman Berita
    public function news()
    {
        return view('layouts.news');
    }

    // Halaman Kontak
    public function contact()
    {
        return view('layouts.contact');
    }
}
