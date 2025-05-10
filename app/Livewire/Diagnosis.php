<?php

namespace App\Livewire;

use App\Helpers\DempsterShafer;
use App\Models\Gejala;
use App\Models\Penyakit;
use Livewire\Component;

class Diagnosis extends Component
{

    public $gejala;
    public $id_gejala_terpilih = [];

    public function start()
    {
        if (empty($this->id_gejala_terpilih)) {
            return; // atau bisa redirect/emit alert error
        }

        $hasil = null;
        /**/
        /* $M1 = new DempsterShafer([['P01,P02,P03' => 0.4]]); */
        /* $M2 = new DempsterShafer([['P01,P02' => 0.6]]); */
        /**/
        /* $M3 = $M1->combinate($M2); */
        /**/
        /* $M4 = new DempsterShafer([['P02,P03,P04' => 0.4]]); */
        /**/
        /* $M5 = $M3->combinate($M4); */
        /**/
        /* dd($M1,$M2,$M3, $M4, $M5); */

            /* $penyakit = Penyakit::whereHas('gejala', function ($query) { */
            /*     $query->where('id_gejala', 1); */
            /* })->get(); */
            /**/
            /* $nama_penyakit = $penyakit->pluck('kode')->implode(','); */
            /**/
            /* $bobot_gejala = Gejala::find(1)->bobot ?? 0; */
            /**/
            /* $M1 = new DempsterShafer([[$nama_penyakit => $bobot_gejala]]); */
            /**/
            /* $penyakit = Penyakit::whereHas('gejala', function ($query) { */
            /*     $query->where('id_gejala', 2); */
            /* })->get(); */
            /**/
            /* $nama_penyakit = $penyakit->pluck('kode')->implode(','); */
            /**/
            /* $bobot_gejala = Gejala::find(2)->bobot ?? 0; */
            /**/
            /* $M2 = new DempsterShafer([[$nama_penyakit => $bobot_gejala]]); */
            /**/
            /* $penyakit = Penyakit::whereHas('gejala', function ($query)  { */
            /*     $query->where('id_gejala', 3); */
            /* })->get(); */
            /**/
            /* $nama_penyakit = $penyakit->pluck('kode')->implode(','); */
            /**/
            /* $bobot_gejala = Gejala::find(3)->bobot ?? 0; */
            /**/
            /* $M3 = $M1->combinate($M2); */
            /**/
            /* $M4 = new DempsterShafer([[$nama_penyakit => $bobot_gejala]]); */
            /**/
            /* $M5 = $M3->combinate($M4); */
            /**/
            /* dd($M1,$M2,$M3, $M4, $M5); */

        foreach ($this->id_gejala_terpilih as $id_gejala) {
            $penyakit = Penyakit::whereHas('gejala', function ($query) use ($id_gejala) {
                $query->where('id_gejala', $id_gejala);
            })->get();

            $nama_penyakit = $penyakit->pluck('kode')->implode(',');

            $bobot_gejala = Gejala::find($id_gejala)->bobot ?? 0;

            $ds = new DempsterShafer([[$nama_penyakit => $bobot_gejala]]);

            $hasil = $hasil ? $hasil->combinate($ds) : $ds;
        }

        dd($hasil);

    }

    public function mount() {

        $this->gejala = Gejala::all();

    }

    public function render()
    {
        return view('livewire.diagnosis');
    }
}
