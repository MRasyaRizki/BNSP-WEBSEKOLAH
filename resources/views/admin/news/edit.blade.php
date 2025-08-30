@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h3>Edit Berita</h3>

        <form action="{{ route('admin.news.update', $news->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Konten</label>
                <textarea name="content" class="form-control" rows="5" required>{{ old('content', $news->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control">
                @if($news->thumbnail)
                    <img src="{{ asset('storage/'.$news->thumbnail) }}" width="120" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection
