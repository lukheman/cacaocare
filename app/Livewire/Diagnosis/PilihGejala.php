<?php

namespace App\Livewire\Diagnosis;

use App\Helpers\DempsterShafer;
use App\Models\Gejala;
use App\Models\LogDiagnosis;
use App\Models\Penyakit;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function array_keys;
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

        $result = $hasil->sumBeliefByGejala();
        $this->kode_penyakit = array_keys($result);
        $this->penyakit = Penyakit::whereIn('kode', $this->kode_penyakit)
            ->get()
            ->map(function ($item) use ($result) {
                $item->belief = round($result[$item->kode] * 100, 2); // tambahkan field belief ke model
                $item->densitas = $result[$item->kode];
                return $item;
            })
            ->sortByDesc('belief')
            ->values();

        session(['hasil_diagnosis' => ['penyakit' => $this->penyakit]]);
        $this->simpanHasilDiagnosis();
        $this->dispatch('showHasilDiagnosis');

    }

    public function simpanHasilDiagnosis()
    {
        $info_pasien = session('info_pasien', []);
        $nama = $info_pasien['nama'] ?? '';
        $umur = $info_pasien['umur'] ?? '';

        foreach ($this->penyakit as $item) {
            $log_diagnosis = LogDiagnosis::simpan($nama, $umur, $item->id, $item->belief);

            foreach ($this->id_gejala_terpilih as $id_gejala) {
                $log_diagnosis->details()->create([
                    'id_gejala' => $id_gejala,
                ]);
            }
        }
    }

    public function backToInfoPasien()
    {
        $this->dispatch('showInfoPasien');
    }

    public function mount()
    {
        $this->gejala = Gejala::all();
    }

    public function render()
    {
        return view('livewire.diagnosis.pilih-gejala');
    }
}
