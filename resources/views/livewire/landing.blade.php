<div class="container">
    <div class="row">

        <div class="col-12">
            <nav class="navbar fixed-top navbar-expand-lg border-bottom border-3 container">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Silambung</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#daftar-penyakit">Daftar Penyakit</a>
                            </li>
                            <li class="nav-item">
                                <a class="ms-4 btn btn-primary" href="{{ route('login')}}">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-12 vh-100 align-items-center justify-content-start" style="padding-top: 300px">
            <div class="row">
                <div class="col-md-6">

            <h1>Selamat Datang</h1>
            <p>Sistem Pakar penyakti lambung adalah sebuah sistem berbasis komputer yang dirancang untuk meniru
                proses berpikir seorang pakar (dokter atau spesialis gastroenterologi) dalam mendiagnosis dan
                memberikan saran pengobatan untuk berbagai gangguan atau penyakit yang berhubungan dengan lambung
            </p>

            <a href="{{ route('login')}}" class="btn btn-outline-primary">Mulai Konsultasi</a>
                </div>
            </div>
        </div>

        <div class="col-12 vh-100 mt-5 " id="daftar-penyakit" style="padding-top: 200px">

            <div class="row">

                @foreach ($penyakit as $item)

                    <div class="col-4 mt-3">

                        <div class="card h-100">
                            <div class="card-header">
                                <h3 class="card-title">{{ $item->nama }}</h3>
                            </div>

                            <div class="card-body">
                                <p>{{ $item->deskripsi }}</p>
                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>


</div>
