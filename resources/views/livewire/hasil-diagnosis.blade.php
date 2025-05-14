<div>
        <p>
Berdasarkan gejala yang Anda alami dan hasil analisis sistem pakar, kemungkinan Anda menderita Penyakit </p>

    <ul>

    @foreach ($penyakit as $item)
        <li>{{ $item->nama }} = {{ $belief }}%</li>
    @endforeach

    </ul>

    @foreach ($penyakit as $item)
    <p>
        Penjelasan tentang Penyakit {{ $item->nama}}:
    </p>
    <p>
        {{ $item->deskripsi }}
    </p>

    <p>
    Solusi / Saran Pengobatan:
    </p>
    <!-- <p> -->
    <!--     Berdasarkan diagnosis ini, kami sarankan untuk melakukan langkah-langkah berikut guna membantu meredakan gejala dan mempercepat pemulihan Anda: -->
    <!-- </p> -->
    <p>{{ $item->solusi }}</p>
    @endforeach

    <button wire:click="diagnosisAgain" class="btn btn-primary">Ulangi Diagnosis</button>

</div>
