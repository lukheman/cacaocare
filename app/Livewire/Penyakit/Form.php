<?php

namespace App\Livewire\Penyakit;

use App\Livewire\Forms\PenyakitForm;
use App\Models\Penyakit;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{

    public string $state = 'create';
    public PenyakitForm $form;

    #[On('createPenyakit')]
    public function showCreatePenyakit() {
        $this->state = 'create';
        $this->form->reset();
    }

    #[On('editPenyakit')]
    public function showEditForm($id) {
        $this->state = 'edit';

        $penyakit = Penyakit::find($id);

        $this->form->nama = $penyakit->nama;
        $this->form->kode = $penyakit->kode;
        $this->form->deskripsi = $penyakit->deskripsi ?? '';
        $this->form->solusi = $penyakit->solusi ?? '';
        $this->form->id = $penyakit->id;

    }

    public function update() {
        $this->form->update();
        $this->dispatch('penyakitUpdated');
        $this->dispatch('toast', message: 'Data Penyakit berhasil diperbarui', type: 'warning');
    }

    public function save() {
        $this->form->store();
        $this->dispatch('penyakitCreated');
        $this->dispatch('toast', message: 'Data Penyakit berhasil ditambahkan', type: 'success');
    }

    public function render()
    {
        return view('livewire.penyakit.form');
    }
}
