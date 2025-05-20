<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/svg/favicon.svg" type="image/x-icon">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/app.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/app-dark.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/css/iconly.css">

         <!-- Script GSAP -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    </head>

    <body>


        <div id="app">

            <div class="container">

            <nav class="navbar fixed-top navbar-expand-lg bg-white container">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Silambung</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('landing')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#daftar-penyakit">Daftar Penyakit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('diagnosis') }}">Diagnosis</a>
                            </li>
                            <li class="nav-item">
                                    @auth
                                        <a class="ms-4 btn btn-primary" href="{{ route('admin.dashboard')}}">Dashboard</a>
                                    @else
                                        <a class="ms-4 btn btn-primary" href="{{ route('login')}}">Login</a>
                                    @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            </div>



            <div class="container mt-5" style="padding-top: 80px;">

            {{ $slot }}
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/initTheme.js"></script>
        <!-- Start content here -->

        <!-- End content -->
        <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/components/dark.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/compiled/js/app.js"></script>

        <!-- Need: Apexcharts -->
        <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/zuramai/mazer@docs/demo/assets/static/js/pages/dashboard.js"></script>

<!-- 3. SCRIPT GSAP -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sembunyikan semua card di awal
        gsap.set('.card-item', {opacity: 0, y: 50});

        // Animasikan card satu per satu
        gsap.to('.card-item', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.1, // delay antar elemen
            ease: "power2.out"
        });
    });
</script>
    </body>

</html>
