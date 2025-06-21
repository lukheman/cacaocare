<?php

namespace App\Livewire\Forms;

use App\Models\Penyakit;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PenyakitForm extends Form
{
    #[Rule(['required', 'unique:penyakit,kode'])]
    public string $kode = '';

    #[Rule(['required'])]
    public string $nama = '';

    #[Rule(['nullable'])]
    public string $deskripsi = '';

    #[Rule(['nullable'])]
    public string $solusi = '';

    public string $id = '';

    public function messages(): array
    {
        return [
            'kode.unique' => 'Kode Penyakit telah digunakan',
        ];
    }

    public function store()
    {

        $validated = $this->validate();

        Penyakit::create([
            'kode' => $validated['kode'],
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'solusi' => $validated['solusi'],
        ]);

        $this->reset();

    }

    public function update()
    {
        $penyakit = Penyakit::query()->find($this->id);
        $penyakit->update($this->validate());
    }
}
