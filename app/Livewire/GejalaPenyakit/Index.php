<?php

namespace App\Livewire\GejalaPenyakit;

use App\Models\Penyakit;
use Livewire\Component;

class Index extends Component
{

    public $state = '';
    public $id_penyakit;

    public function show($id) {
        $this->state = 'show';
        $this->id_penyakit = $id;
        $this->dispatch('showGejalaPenyakit', $id);
    }

    public function edit($id) {
        $this->dispatch('editGejalaPenyakit', $id);
        $this->id_penyakit = $id;
        $this->state = 'edit';
    }

    public function render()
    {

        $rules = Penyakit::with('gejala')->get();
        return view('livewire.gejala-penyakit.index', ['rules' => $rules]);

    }
}
