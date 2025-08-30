<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sekolah</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
        margin: 0;
        padding: 0;
        }

        .navbar {
        margin-bottom: 0; /* hilangkan space bawah navbar */
        }

        .card-hover {
        transition: transform 0.3s, box-shadow 0.3s;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

    </style>

</head>
<body>

    {{-- TOPBAR --}}
    <header id="topbar" class="bg-white border-bottom">
    <div class="container py-2 d-flex justify-content-between align-items-center flex-wrap">
        {{-- Logo Sekolah --}}
        <div class="d-flex align-items-center mb-2 mb-lg-0">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Sekolah" height="50" class="me-2">
        <div>
            <h5 class="mb-0 fw-bold text-primary">SMA NEGERI 1 ROBLOX</h5>
            <span class="text-warning fw-semibold small">BANDUNG</span>
        </div>
        </div>

        {{-- Kontak & Sosmed (desktop: tampil penuh, mobile: minimalis) --}}
        <div class="d-none d-lg-flex align-items-center gap-3">
        <div class="d-flex align-items-center">
            <i class="bi bi-telephone-fill text-warning me-2"></i>
            <div>
            <small class="text-muted d-block">Telepon</small>
            <small class="fw-semibold">+62 123 456 890</small>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <i class="bi bi-envelope-fill text-warning me-2"></i>
            <div>
            <small class="text-muted d-block">Email</small>
            <small class="fw-semibold">info@sman1bdg.sch.id</small>
            </div>
        </div>

        <div class="d-flex gap-2 fs-5">
            <a href="#" class="text-success"><i class="bi bi-whatsapp"></i></a>
            <a href="#" class="text-danger"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-dark"><i class="bi bi-tiktok"></i></a>
        </div>
        </div>

        {{-- Versi mobile: hanya ikon kontak --}}
        <div class="d-flex d-lg-none gap-3 fs-5">
        <a href="tel:+62226123806" class="text-warning"><i class="bi bi-telephone-fill"></i></a>
        <a href="mailto:info@sman1bdg.sch.id" class="text-warning"><i class="bi bi-envelope-fill"></i></a>
        <a href="#" class="text-success"><i class="bi bi-whatsapp"></i></a>
        </div>
    </div>
    </header>

    {{-- NAVBAR --}}
    <nav id="mainNav"
        class="navbar navbar-expand-lg navbar-light bg-white py-2 sticky-top shadow-sm"
        style="z-index:1020">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link fw-semibold px-2 fs-6" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold px-2 fs-6" href="{{ url('/about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold px-2 fs-6" href="{{ url('/activities') }}">Activities</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold px-2 fs-6" href="{{ url('/news') }}">News</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold px-2 fs-6" href="{{ url('/contact') }}">Contact</a></li>
                </ul>

                {{-- tombol kanan navbar hanya muncul jika admin login --}}
                @auth
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ url('/admin') }}" class="btn btn-outline-primary btn-sm fw-semibold">
                                <i class="bi bi-gear-fill me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm fw-semibold">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>




    <!-- Content -->
    @yield('content')

    <!-- Section umum dengan container -->
    <div class="container my-5">
        @yield('page-content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; {{ date('Y') }} SMA SWASTA 1 ROBLOX. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
