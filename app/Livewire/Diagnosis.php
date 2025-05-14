<?php

namespace App\Livewire;

use App\Helpers\DempsterShafer;
use App\Models\Gejala;
use App\Models\Penyakit;
use Livewire\Attributes\On;
use Livewire\Component;

class Diagnosis extends Component
{

    public $gejala;
    public $id_gejala_terpilih = [];
    public $visible = true;

    #[On('showDiagnosis')]
    public function showDiagnosis() {
        $this->visible = true;
    }

    public function start()
    {

        $this->visible = false;
        if (empty($this->id_gejala_terpilih)) {
            return; // atau bisa redirect/emit alert error
        }

        $hasil = null;

        foreach ($this->id_gejala_terpilih as $id_gejala) {
            $penyakit = Penyakit::whereHas('gejala', function ($query) use ($id_gejala) {
                $query->where('id_gejala', $id_gejala);
            })->get();

            $nama_penyakit = $penyakit->pluck('kode')->implode(',');

            $bobot_gejala = Gejala::find($id_gejala)->bobot ?? 0;

            $ds = new DempsterShafer([[$nama_penyakit => $bobot_gejala]]);

            $hasil = $hasil ? $hasil->combinate($ds) : $ds;
        }

        /* dd($hasil, $hasil->plausibility()); */

        $hasil->filterConflict();
        $this->dispatch('showHasilDiagnosis', $hasil->getMaxValue());

    }

    public function mount() {

        $this->gejala = Gejala::all();

    }

    public function render()
    {
        return view('livewire.diagnosis');
    }
}
