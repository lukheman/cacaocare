<div class="row justify-content-center">

    <div class="col-10">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Diagnosis Pasien</h4>
            </div>

            <div class="card-body">

        @if ($step === 1)
            <livewire:diagnosis.info-pasien />
        @elseif($step === 2)
            <livewire:diagnosis.pilih-gejala />
        @elseif($step === 3)
            <livewire:diagnosis.hasil-diagnosis />
        @endif

            </div>

        </div>


    </div>

</div>
