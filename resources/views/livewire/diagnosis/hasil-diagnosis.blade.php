<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white text-center">
        <h4><b>Hasil Diagnosis</b></h4>
    </div>

    <div class="card-body">

        <div class="mb-3">
            <p><b>Nama:</b> {{ $nama }}</p>
            <p><b>Umur:</b> {{ $umur }} tahun</p>
        </div>

        <p>
            Berdasarkan gejala yang Anda alami dan hasil analisis sistem pakar, kemungkinan besar Anda menderita:
        </p>

        <ul class="list-group mb-4">
            @foreach ($penyakit as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><b>{{ $item->nama }}</b></span>
                    <span class="badge bg-success rounded-pill">{{ $item->belief }}%</span>
                </li>
            @endforeach
        </ul>

        <table class="table table-striped table-bordered mb-4">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Nilai presentase</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Kemungkinan kecil</td>
                    <td>0% - 50%</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kemungkinan</td>
                    <td>51% - 79%</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Kemungkinan besar</td>
                    <td>80% - 99%</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Sangat berkemungkinan/sangat yakin</td>
                    <td>100%</td>
                </tr>
            </tbody>
        </table>

        @foreach ($penyakit as $item)
            <div class="mb-4">
                <h5 class="text-primary">Penjelasan Penyakit {{ $item->nama }}</h5>
                <p>{{ $item->deskripsi }}</p>

                <h6 class="text-danger">Solusi / Saran Pengobatan:</h6>
                <p>{{ $item->solusi }}</p>
                <hr>
            </div>
        @endforeach

        <div class="text-center">
            <button wire:click="restartDiagnosisFlow" class="btn btn-outline-primary">
               <i class="fa-solid fa-repeat"></i> Ulangi Diagnosis
            </button>
        </div>
    </div>
</div>/div>
