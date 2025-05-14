<?php

namespace App\Livewire;

use App\Models\Penyakit;
use Livewire\Attributes\On;
use Livewire\Component;

class HasilDiagnosis extends Component
{

    public $penyakit = [];
    public $belief = 0.0;

    #[On('showHasilDiagnosis')]
    public function fillHasilDiagnosis($data) {
        $kode_penyakit = explode(',', array_key_first($data));
        $this->belief = round(array_values($data)[0] * 100, 2);
        $this->penyakit = Penyakit::whereIn('kode', $kode_penyakit)->get();
    }

    public function diagnosisAgain() {
        $this->dispatch('showDiagnosis');
    }

    public function render()
    {
        return view('livewire.hasil-diagnosis');
    }
}
