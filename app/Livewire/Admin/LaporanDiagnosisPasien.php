<?php

namespace App\Livewire\Admin;

use App\Models\LogDiagnosis;
use Livewire\Component;
use Livewire\WithPagination;

class LaporanDiagnosisPasien extends Component
{
    use WithPagination;


    public function render()
    {

        $log_diagnosis = LogDiagnosis::with('penyakit')->paginate(5);
        return view('livewire.admin.laporan-diagnosis-pasien', ['log_diagnosis' => $log_diagnosis]);
    }
}
