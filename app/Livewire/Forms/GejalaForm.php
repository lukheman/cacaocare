<?php

namespace App\Livewire\Forms;

use App\Models\Gejala;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GejalaForm extends Form
{

    #[Validate(onUpdate: false)]
    #[Rule(['required', 'unique:gejala,kode'])]
    public string $kode = '';

    #[Rule(['required'])]
    public string $nama = '';

    #[Rule('required')]
    public float $bobot = 0;


    public string $id = '';

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'kode.unique' => 'Kode penyakit telah digunakan',
        ];
    }

    public function store() {

        $validated = $this->validate();

        Gejala::query()->create([
            'kode' => $validated['kode'],
            'nama' => $validated['nama'],
            'bobot' => $validated['bobot'],
        ]);

        $this->reset();


    }

    public function update() {

        $gejala = Gejala::find($this->id);

        if ($this->kode === $gejala->kode) {
            $gejala->update([
                'nama' => $this->nama,
                'bobot' => $this->bobot,
            ]);
        } else {
            $gejala->update($this->validate());
        }


    }

}
