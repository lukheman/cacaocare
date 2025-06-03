<div class="row vh-100 justify-content-center">

    <div class="col-8 text-center text-white" style="padding-top: 8rem;">

                <h1 class="text-white">Selamat Datang</h1>
                <p>Sistem Pakar penyakti lambung adalah sebuah sistem berbasis komputer yang dirancang untuk meniru
                    proses berpikir seorang pakar (dokter atau spesialis gastroenterologi) dalam mendiagnosis dan
                    memberikan saran pengobatan untuk berbagai gangguan atau penyakit yang berhubungan dengan lambung
                </p>

                <a href="{{ route('diagnosis')}}" class="btn btn-primary">Mulai Konsultasi</a>
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


