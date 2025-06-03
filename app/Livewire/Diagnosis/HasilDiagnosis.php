<?php

namespace App\Livewire\Diagnosis;

use App\Models\Penyakit;
use Livewire\Attributes\On;
use Livewire\Component;

class HasilDiagnosis extends Component
{

    public $penyakit = [];
    public $belief = 0.0;
    public string $nama;
    public string $umur;

    public function mount() {
        $hasil_diagnosis = session('hasil_diagnosis', []);
        $this->penyakit = $hasil_diagnosis['penyakit'] ?? '';
        $this->belief = $hasil_diagnosis['belief'] ?? '';

        $info_pasien = session('info_pasien', []);
        $this->nama = $info_pasien['nama'] ?? '';
        $this->umur = $info_pasien['umur'] ?? '';

    }

    public function restartDiagnosisFlow() {
        $this->dispatch('restartDiagnosisFlow');
    }

    public function render()
    {
        return view('livewire.diagnosis.hasil-diagnosis');
    }
}
