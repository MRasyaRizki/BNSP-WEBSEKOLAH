@extends('layouts.app')

@section('content')
<section class="pt-3 pb-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <h1 class="fw-bold mb-3">{{ $news->title }}</h1>
                <div class="d-flex flex-wrap text-muted mb-4">
                    <span class="me-3">
                        <i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($news->date)->format('d M Y') }}
                    </span>
                    <span class="me-3">
                        <i class="bi bi-person"></i> Diposting oleh: {{ $news->author->name ?? 'Admin' }}
                    </span>
                    <span class="ms-auto">
                        Bagikan:
                        <a href="#" class="text-decoration-none me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-decoration-none me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-decoration-none me-2"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="text-decoration-none"><i class="bi bi-telegram"></i></a>
                    </span>
                </div>

                @if($news->thumbnail)
                    <img src="{{ asset('storage/'.$news->thumbnail) }}"
                         alt="{{ $news->title }}"
                         class="img-fluid rounded mb-4"
                         style="min-height: 300px; object-fit: cover; width: 100%;">
                @endif

                <div class="article-content mb-5" style="line-height: 1.8;">
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
