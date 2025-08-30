@extends('layouts.app')

@section('content')
{{-- ABOUT US --}}
<section class="py-5 bg-light">
    <div class="container">

        {{-- Judul --}}
        <h4 class="fw-bold mb-3 text-start">Tentang Kami</h4>

        {{-- Gambar --}}
        <div class="mb-4 text-start">
            <img src="https://dummyimage.com/1920x1280/000/fff"
                class="img-fluid rounded-3 shadow w-50"
                alt="Tentang Kami"
                style="max-height: 350px; object-fit: cover;">
        </div>

        {{-- Teks --}}
        <div class="col-lg-8 text-start">
            <p class="text-muted">
                <b>SMA Negeri 1 ROBLOX Bandung</b> merupakan salah satu sekolah menengah atas unggulan di Kota Bandung yang memiliki komitmen tinggi
                dalam mencetak generasi muda yang cerdas, berkarakter, dan berdaya saing global. Didirikan pada tahun 1975, SMAN 1 Bandung
                terus berkembang menjadi institusi pendidikan yang adaptif terhadap perkembangan zaman dan kebutuhan peserta didik.
            </p>
            <p class="text-muted">
                sekolah ini dikenal dengan lingkungan belajar yang kondusif, dukungan fasilitas yang memadai, serta tenaga pendidik
                yang profesional dan berdedikasi.
            </p>

            <p class="text-muted">
                <b>SMAN 1 Bandung</b> mengimplementasikan Kurikulum Merdeka, serta aktif sebagai bagian dari program Guru Penggerak,
                dengan fokus pada penguatan karakter, literasi, numerasi, serta pengembangan kompetensi abad 21. Selain pembelajaran
                akademik, sekolah ini juga mendorong siswa untuk aktif dalam berbagai kegiatan ekstrakurikuler, organisasi,
                dan program pengembangan diri lainnya.
            </p>
        </div>

    </div>
</section>
@endsection
