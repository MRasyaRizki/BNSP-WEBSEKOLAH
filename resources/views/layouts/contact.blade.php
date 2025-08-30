@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="mb-4">Kontak Kami</h1>

        {{-- Kontak Sekolah --}}
        <div class="mb-5">
            <h5 class="fw-bold">Kontak Sekolah</h5>
            <div class="bg-white p-4 rounded-3 shadow-sm">
                <p class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Indonesia</p>
                <p class="mb-2"><i class="bi bi-telephone-fill me-2"></i>+62 123 456 789</p>
                <p class="mb-2"><i class="bi bi-whatsapp me-2"></i>085123456789</p>
                <p class="mb-0"><i class="bi bi-envelope-fill me-2"></i>info@sman1bandung.sch.id</p>
            </div>
        </div>

        {{-- Sosial Media --}}
        <div class="mb-5">
            <h5 class="fw-bold">Sosial Media</h5>
            <div class="bg-white p-4 rounded-3 shadow-sm">
                <p class="mb-2"><i class="bi bi-instagram me-2"></i><a href="https://www.instagram.com/sman1bandung" target="_blank">Instagram</a></p>
                <p class="mb-0"><i class="bi bi-tiktok me-2"></i><a href="https://www.tiktok.com/@sman1bandung" target="_blank">TikTok</a></p>
            </div>
        </div>

        {{-- Form Kontak --}}
        <div class="bg-white p-4 rounded-3 shadow-sm">
            <form action="{{ route('kontak.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama anda">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan email anda">
            </div>
            <div class="mb-3">
                <label class="form-label">Pesan</label>
                <textarea class="form-control" name="pesan" rows="4" placeholder="Tulis pesan anda"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
        </div>
    </div>
</section>
@endsection
