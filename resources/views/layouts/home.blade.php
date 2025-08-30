@extends('layouts.app')

@section('content')

<style>
    .carousel-caption {
        top: 0;
        bottom: 0;
        left: 10%;
        right: 10%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        text-align: left;
    }
    .carousel-caption h2 { font-size: 2rem; font-weight: 700; }
    .carousel-caption p { font-size: 1rem; max-width: 600px; }
    .carousel-item img {
        height: 80vh;
        width: 100%;
        object-fit: cover;
    }
</style>

{{-- Banner Carousel --}}
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://dummyimage.com/1920x800/000000/fff" class="d-block w-100" alt="Banner 1">
            <div class="carousel-caption">
                <h2 class="fw-bold">Pengumuman SPMB SMAN 1 Bandung</h2>
                <p>Sistem Penerimaan Siswa Baru (SPMB JABAR 2025)...</p>
                <a href="#" class="btn btn-primary rounded-pill px-4">Selengkapnya</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://dummyimage.com/1920x800/000000/fff" class="d-block w-100" alt="Banner 2">
            <div class="carousel-caption">
                <h2 class="fw-bold">Kegiatan Sekolah</h2>
                <p>Berbagai kegiatan akademik dan non-akademik...</p>
                <a href="{{ url('/activities') }}" class="btn btn-primary rounded-pill px-4">Lihat Kegiatan</a>
            </div>
        </div>
    </div>

    {{-- Control --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

{{-- SAMBUTAN & STATISTIK --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4 align-items-center">

            {{-- Sambutan --}}
            <div class="col-lg-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/men/64.jpg"
                        alt="Kepala Sekolah"
                        class="rounded-circle me-3"
                        width="120" height="120"
                        style="object-fit: cover;">
                    <div>
                        <h5 class="fw-bold mb-1">Drs. H. Roblox, M.Pd</h5>
                        <small class="text-muted">Kepala Sekolah</small>
                    </div>
                </div>
                <p class="mb-3">
                    Bismillahirrohmanirrohim, Assalamualaikum Warahmatullahi Wabarakatuh.
                    Alhamdulillah kami panjatkan kehadirat Allah SWT, bahwa dengan rahmat
                    dan karunia-Nya lah akhirnya Website sekolah ini dapat hadir untuk
                    mendukung informasi sekolah.
                </p>
            </div>

            {{-- Statistik --}}
            <div class="col-lg-6">
                <div class="bg-white shadow rounded-4 p-4 text-center d-flex justify-content-around">
                    <div>
                        <h3 class="fw-bold text-primary mb-0">75</h3>
                        <small class="text-muted">Guru & Staf</small>
                    </div>
                    <div>
                        <h3 class="fw-bold text-primary mb-0">1208</h3>
                        <small class="text-muted">Siswa</small>
                    </div>
                    <div>
                        <h3 class="fw-bold text-primary mb-0">34</h3>
                        <small class="text-muted">Rombel</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- AGENDA diganti ACTIVITIES --}}
<section class="py-5 bg-light">
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

{{-- BERITA diganti NEWS --}}
<section class="py-5" style="background-color: #e9f5ff;">
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
