@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h3 class="fw-bold mb-4 text-center">Dashboard Admin</h3>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-4 text-center">
                    <h5>Berita</h5>
                    <h2>{{ $newsCount }}</h2>
                    <a href="#news-section" class="btn btn-primary mt-2">Kelola Berita</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-4 text-center">
                    <h5>Kegiatan</h5>
                    <h2>{{ $activitiesCount }}</h2>
                    <a href="#activities-section" class="btn btn-success mt-2">Kelola Kegiatan</a>
                </div>
            </div>
        </div>

        <!-- News Section -->
        <div id="news-section" class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Daftar Berita</h4>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Tambah Berita</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item->thumbnail)
                                <img src="{{ asset('storage/'.$item->thumbnail) }}" width="80" alt="{{ $item->title }}">
                                @endif
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', $item->slug) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.news.destroy', $item->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $news->links() }}
            </div>
        </div>

        <!-- Activity Section -->
        <div id="activities-section">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Daftar Kegiatan</h4>
                <a href="{{ route('admin.activities.create') }}" class="btn btn-success">Tambah Kegiatan</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $activity)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($activity->thumbnail)
                                <img src="{{ asset('storage/'.$activity->thumbnail) }}" width="80" alt="{{ $activity->title }}">
                                @endif
                            </td>
                            <td>{{ $activity->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.activities.edit', $activity->slug) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.activities.destroy', $activity->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus kegiatan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $activities->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
