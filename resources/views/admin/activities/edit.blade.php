@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h3>Edit Kegiatan</h3>

        {{-- Menampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.activities.update', $activity->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title', $activity->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="5" required>{{ old('description', $activity->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="date" class="form-control"
                       value="{{ old('date', $activity->date->format('Y-m-d')) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control">

                @if($activity->thumbnail)
                    <div class="mt-2">
                        <p>Thumbnail saat ini:</p>
                        <img src="{{ asset('storage/'.$activity->thumbnail) }}"
                             alt="Thumbnail" class="img-fluid rounded" width="200">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</section>
@endsection
