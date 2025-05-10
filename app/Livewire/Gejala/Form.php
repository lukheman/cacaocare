<?php

namespace App\Livewire\Gejala;

use App\Livewire\Forms\GejalaForm;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Gejala;

class Form extends Component
{
    public string $state = 'create';
    public GejalaForm $form;

    #[On('editGejala')]
    public function showEditForm($id) {

        $this->state = 'edit';

        $gejala = Gejala::find($id);

        $this->form->kode = $gejala->kode;
        $this->form->nama = $gejala->nama;
        $this->form->bobot = $gejala->bobot;
        $this->form->id = $gejala->id;

    }

    #[On('createGejala')]
    public function showCreateForm() {
        $this->state = 'create';
        $this->form->reset();
    }

    public function update() {
        $this->form->update();
        $this->dispatch('gejalaUpdated');
        $this->dispatch('toast', message: 'Data gejala berhasil diubah', type: 'warning');

    }

    public function save() {
        $this->form->store();
        $this->dispatch('gejalaCreated');
        $this->dispatch('toast', message: 'Data gejala berhasil ditambahkan', type: 'success');
    }

    public function render()
    {
        return view('livewire.gejala.form');
    }
}
