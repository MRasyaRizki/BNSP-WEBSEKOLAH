@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="fw-bold mb-4 text-center">Berita Terbaru</h3>
        <div class="row g-4">
            @foreach ($news as $item)
            <div class="col-md-4">
                <a href="{{ route('news.show', $item->slug) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm border-0 rounded-3 card-hover">
                        <img src="{{ $item->thumbnail ? asset('storage/'.$item->thumbnail) : 'https://dummyimage.com/600x400/eee/aaa' }}"
                            class="card-img-top"
                            alt="{{ $item->title }}"
                            style="height: 200px; object-fit: cover;">
                            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2 px-3 py-2 rounded-pill">
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </span>
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $item->title }}</h5>
                            <p class="card-text text-muted small">
                                {{ Str::limit(strip_tags($item->content), 100) }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
