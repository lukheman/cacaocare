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
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </head>

    <body>

        <div id="app">
            <!-- Sidebar -->
            <div id="sidebar" class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html">Mazer</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        @if (auth()->check() && auth()->user()->role === 'admin')
                            <livewire:admin.navigation></livewire:admin>
                        @elseif(auth()->check() && auth()->user()->role === 'user')
                            <livewire:user.navigation></livewire:user>
                        @endif


                        <!-- Menu with Submenu -->
                        <!-- <li class="sidebar-item has-sub"> -->
                        <!--     <a href="#" class="sidebar-link"> -->
                        <!--         <i data-feather="grid" width="20"></i> -->
                        <!--         <span>Components</span> -->
                        <!--     </a> -->
                        <!--     <ul class="submenu"> -->
                        <!--         <li class="submenu-item"> -->
                        <!--             <a href="component-alert.html">Alert</a> -->
                        <!--         </li> -->
                        <!--         <li class="submenu-item"> -->
                        <!--             <a href="component-badge.html">Badge</a> -->
                        <!--         </li> -->
                        <!--     </ul> -->
                        <!-- </li> -->


                    </ul>
                </div>
            </div>
            <!-- Main Content -->
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                <!-- <x-page-heading>Akmal</x-page-heading> -->

                <div class="page-content">
                    {{ $slot }}
                </div>
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

        <script>
            document.addEventListener('livewire:initialized', () => {

                Livewire.on('toast', ({ message, type }) => {

                    let backgroundColor;

                    if(type === 'warning') {
                        backgroundColor = '#f0ad4e';
                    } else if (type === 'danger') {
                        backgroundColor = '#d9534f';
                    } else {
                        backgroundColor = '#4fbe87';
                    }

                    Toastify({
                        text: message,
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: backgroundColor,
                    }).showToast();

                });

            });
        </script>
    </body>

</html>
