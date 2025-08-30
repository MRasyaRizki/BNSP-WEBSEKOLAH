@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h3 class="fw-bold mb-4 text-center">Kegiatan Sekolah</h3>

        <div class="row g-4">
            @foreach ($activities as $activity)
            <div class="col-md-4">
                <a href="{{ route('activities.show', $activity->slug) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm rounded-3 card-hover">
                        <div class="position-relative">
                            <img src="{{ $activity->thumbnail ? asset('storage/'.$activity->thumbnail) : 'https://dummyimage.com/600x400/ddd/666' }}"
                                class="card-img-top"
                                alt="{{ $activity->title }}"
                                style="height: 220px; object-fit: cover;">
                            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2 px-3 py-2 rounded-pill">
                                {{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $activity->title }}</h5>
                            <p class="card-text text-muted small">
                                {{ Str::limit(strip_tags($activity->description), 100) }}
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
