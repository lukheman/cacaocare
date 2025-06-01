<div class="card">

    <div class="card-header">
        <h5 class="text-center"><b>Hasil Diagnosis</b></h5>
    </div>

    <div class="card-body">


        <p>
            Berdasarkan gejala yang Anda alami dan hasil analisis sistem pakar, kemungkinan Anda menderita Penyakit </p>

        <ul>

            @foreach ($penyakit as $item)
            <li>{{ $item->nama }} = {{ $belief }}%</li>
@endforeach

</ul>

        @foreach ($penyakit as $item)
        <p>
<b>Penjelasan tentang Penyakit {{ $item->nama}}:</b>
        </p>
        <p>
            {{ $item->deskripsi }}
        </p>

<p>
            <b> Solusi / Saran Pengobatan: </b>
        </p>
        <p>{{ $item->solusi }}</p>
        <hr>
        @endforeach

        <button wire:click="restartDiagnosisFlow" class="btn btn-primary">Ulangi Diagnosis</button>
</div>

</div>
