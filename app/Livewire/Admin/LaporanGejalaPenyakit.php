<?php

namespace App\Livewire\Admin;

use App\Models\Gejala;
use App\Models\Penyakit;
use Livewire\Attributes\Rule;
use Livewire\Component;


class LaporanGejalaPenyakit extends Component
{
    public $penyakit;

    public function render()
    {
        $this->penyakit = Penyakit::all();

        return view('livewire.admin.laporan-gejala-penyakit');
    }
}
