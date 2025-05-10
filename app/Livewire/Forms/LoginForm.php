<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Enum\Role;

class LoginForm extends Form
{
    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required'])]
    public string $password = '';

    public function store() {


        if(Auth::attempt($this->validate())) {

            if(Role::from(Auth::user()->role) === Role::ADMIN) {
                return redirect()->route('admin.dashboard');

            } else if (Role::from(Auth::user()->role) === Role::USER) {
                return redirect()->route('user.dashboard');
            }

            throw ValidationException::withMessages([
                'role' => 'role tidak ada'
            ]);


        }

        throw ValidationException::withMessages([
            'email' => 'email tidak terdaftar'
        ]);

    }

}
