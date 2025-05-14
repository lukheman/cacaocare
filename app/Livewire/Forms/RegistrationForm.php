<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Enums\Role;
use function redirect;

class RegistrationForm extends Form
{


    #[Rule(['required', 'max:50'])]
    public string $name = '';

    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required', 'min:4', 'confirmed'])]
    public string $password = '';

    #[Rule('required')]
    public string $password_confirmation = '';

    public function store() {

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => Role::Pasien->value,
            'password' => bcrypt($this->password)
        ]);

        return redirect()->route('pasien.dashboard');

    }


}
