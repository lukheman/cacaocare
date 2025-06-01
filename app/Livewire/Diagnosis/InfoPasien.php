<?php

namespace App\Livewire\Diagnosis;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class InfoPasien extends Component
{
    public string $nama = '';
    public string $umur = '';

    public function mount() {
        $info_pasien = session('info_pasien', []);
        $this->nama = $info_pasien['nama'] ?? '';
        $this->umur = $info_pasien['umur'] ?? '';
    }

    public function nextStep() {
        $this->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1|max:150',
        ]);

        session(['info_pasien' => ['nama' => $this->nama, 'umur' => $this->umur]]);
        $this->dispatch('showPilihGejala');
    }

    public function render()
    {
        return view('livewire.diagnosis.info-pasien');
    }
}
