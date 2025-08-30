<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    // Tampilkan semua kegiatan
    public function index()
    {
        $activities = Activity::latest()->paginate(10);
        return view('activities.index', compact('activities'));
    }

    // Form tambah kegiatan
    public function create()
    {
        return view('admin.activities.create');
    }

    // Simpan kegiatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Activity::create([
            'title'       => $validated['title'],
            'slug'        => Str::slug($validated['title']),
            'description' => $validated['description'],
            'date'        => $validated['date'],
            'thumbnail'   => $validated['thumbnail'] ?? null,
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    // Detail kegiatan
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }


    // Form edit kegiatan
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    // Update kegiatan
    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($activity->thumbnail && file_exists(storage_path('app/public/' . $activity->thumbnail))) {
                unlink(storage_path('app/public/' . $activity->thumbnail));
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('activities', 'public');
        }

        $activity->update([
            'title'       => $validated['title'],
            'slug'        => Str::slug($validated['title']),
            'description' => $validated['description'],
            'date'        => $validated['date'],
            'thumbnail'   => $validated['thumbnail'] ?? $activity->thumbnail,
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    // Hapus kegiatan
    public function destroy(Activity $activity)
    {
        if ($activity->thumbnail && file_exists(storage_path('app/public/' . $activity->thumbnail))) {
            unlink(storage_path('app/public/' . $activity->thumbnail));
        }

        $activity->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
