<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Tampilkan semua berita
     */
    public function index()
    {
        $news = News::latest()->paginate(6); // paginate biar rapih
        return view('news.index', compact('news'));
    }

    /**
     * Form tambah berita
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Simpan berita baru
     */
    public function store(Request $request)
    {
        // 🔹 1. Validasi data
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'content'   => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'date'        => 'required|date',
        ]);

        // 🔹 2. Upload file thumbnail (jika ada)
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 🔹 3. Simpan data ke database
        News::create([
            'title'     => $validated['title'],
            'slug'      => Str::slug($validated['title']),
            'content'   => $validated['content'],
            'thumbnail' => $thumbnailPath,
            'date'      => $validated['date'],
            'user_id'   => auth()->id(),
        ]);

        // 🔹 4. Redirect dengan pesan sukses
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Detail berita
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Form edit berita
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update berita
     */
    public function update(Request $request, News $news)
    {
        // 🔹 1. Validasi data
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'content'   => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'date'      => 'required|date',
        ]);

        // 🔹 2. Upload file baru jika ada
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($news->thumbnail && file_exists(storage_path('app/public/' . $news->thumbnail))) {
                unlink(storage_path('app/public/' . $news->thumbnail));
            }

            // Simpan thumbnail baru
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 🔹 3. Update data
        $news->update([
            'title'     => $validated['title'],
            'slug'      => \Illuminate\Support\Str::slug($validated['title']),
            'content'   => $validated['content'],
            'thumbnail' => $validated['thumbnail'] ?? $news->thumbnail,
            'date'      => $validated['date'],
            'user_id'   => auth()->id(),
        ]);

        // 🔹 4. Redirect dengan pesan sukses
        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita
     */
    public function destroy(News $news)
    {
        if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
            Storage::disk('public')->delete($news->thumbnail);
        }
        $news->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil dihapus!');
    }
}
