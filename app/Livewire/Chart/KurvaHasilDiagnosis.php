<?php

namespace App\Livewire\Chart;

use App\Models\Penyakit;
use Livewire\Component;

class KurvaHasilDiagnosis extends Component
{
    public $labels;
    public $data;

    public function render()
    {
        $penyakit = Penyakit::withCount('logDiagnosis')->get();

        $this->labels = $penyakit->pluck('nama');
        $this->data = $penyakit->pluck('log_diagnosis_count');
        return view('livewire.chart.kurva-hasil-diagnosis');
    }
}
