<?php

namespace App\Livewire\Diagnosis;

use App\Helpers\DempsterShafer;
use App\Models\Gejala;
use App\Models\LogDiagnosis;
use App\Models\Penyakit;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use function session;

#[Layout('layouts.guest')]
class PilihGejala extends Component
{

    public $gejala;
    public $id_gejala_terpilih = [];

    public $penyakit;
    public array $kode_penyakit = [];

    public function start()
    {

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

        $hasil->filterConflict();

        $max_value = $hasil->getMaxValue();

        $this->kode_penyakit = explode(',', array_key_first($max_value));
        $this->belief = round(array_values($max_value)[0] * 100, 2);
        $this->penyakit = Penyakit::whereIn('kode', $this->kode_penyakit)->get();

        session(['hasil_diagnosis' => ['penyakit' => $this->penyakit, 'belief' => $this->belief ]]);
        $this->simpanHasilDiagnosis();
        $this->dispatch('showHasilDiagnosis');

    }

    public function simpanHasilDiagnosis() {
        $info_pasien = session('info_pasien', []);
        $nama = $info_pasien['nama'] ?? '';
        $umur = $info_pasien['umur'] ?? '';

        foreach($this->kode_penyakit as $kode) {
            $id_penyakit = Penyakit::query()->where('kode', $kode)->first()->id;
            LogDiagnosis::simpan($nama, $umur, $id_penyakit, $this->belief);
        }
    }

    public function backToInfoPasien() {
        $this->dispatch('showInfoPasien');
    }

    public function mount() {
        $this->gejala = Gejala::all();
    }

    public function render()
    {
        return view('livewire.diagnosis.pilih-gejala');
    }
}
