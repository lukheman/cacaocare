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
        <link rel="stylesheet" href="{{ asset('css/guest.css') }}">

         <!-- Script GSAP -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>


        body {
            content: '';
            position: absolute;
            inset: 0;

            @if (request()->routeIs('diagnosis'))
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url("{{ asset('asset/img/diagnosis-background.jpeg') }}");
            @else
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url("{{ asset('asset/img/landing-background.jpeg') }}");

            @endif

            background-size: cover; /* Menutupi seluruh area */
            background-position: center; /* Posisi gambar di tengah */
            background-repeat: no-repeat; /* Tidak mengulang gambar */
            background-attachment: fixed; /* Gambar tetap saat scroll */
            opacity: 0.9; /* atur tingkat transparansi */
            z-index: -1;
        }
        </style>
    </head>

    <body>


        <div id="app">

            <div class="container">

            <nav class="navbar navbar-expand-lg container">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#">SiLambung</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('landing')}}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#daftar-penyakit">Daftar Penyakit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('diagnosis') }}">Diagnosis</a>
                            </li>
                            <li class="nav-item">
                                    @auth
                                        <a class="ms-4 btn btn-primary" href="{{ route('admin.dashboard')}}">Dashboard</a>
                                    @else
                                        <a class="ms-4 btn btn-primary" href="{{ route('login')}}">Masuk</a>
                                    @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            </div>



            <div class="container" style="padding-top: 80px;">

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
