<?php

namespace App\Livewire\Rule;

use App\Models\Penyakit;
use Livewire\Component;

class Index extends Component
{
    public $state = '';

    public $id_penyakit;

    public function show($id)
    {
        $this->state = 'show';
        $this->id_penyakit = $id;
        $this->dispatch('showGejalaPenyakit', $id);
    }

    public function edit($id)
    {
        $this->state = 'edit';
        $this->id_penyakit = $id;
        $this->dispatch('editGejalaPenyakit', $id);
    }

    public function render()
    {
        $rules = Penyakit::with('gejala')->get();

        return view('livewire.rule.index', [
            'rules' => $rules,
        ]);
    }
}
