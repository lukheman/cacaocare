<?php

namespace App\Livewire;

use App\Livewire\Forms\RegistrationForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Registration extends Component
{
    public RegistrationForm $form;

    public function regis() {

        $this->form->store();

    }

    public function render()
    {
        return view('livewire.registration');
    }
}
