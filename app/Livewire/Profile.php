<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profil')]
class Profile extends Component
{
    public ProfileForm $form;

    public function edit()
    {
        if ($this->form->update()) {

            $this->dispatch('toast', message: 'Berhasil menyimpan perubahan profile');
        }

    }

    public function mount()
    {

        $user = auth()->user();

        $this->form->name = $user->name;
        $this->form->email = $user->email;

    }

    public function render()
    {
        return view('livewire.profile');
    }
}
