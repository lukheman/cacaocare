
<?php

namespace App\Livewire\Gejala;


use App\Livewire\Forms\GejalaForm;
use Livewire\Component;

use App\Models\Gejala;

use Livewire\Attributes\On;

class Index extends Component
{

    public GejalaForm $form;

    public string $state = 'create';

    /* #[On(['gejalaCreated', 'gejalaUpdated'])] */
    /* public function updateList() { */
        /* FIX: ketika menghapus data, pagination tidak terupdate */
    /* } */

    public function delete($id) {

        Gejala::query()->find($id)->delete();

        $this->dispatch('toast', message: 'Gejala berhasil dihapus', type: 'danger');

    }

    public function edit($id) {
        $this->state = 'edit';
        $this->dispatch('editGejala', $id);
    }

    public function create() {
        $this->state = 'create';
    }

    public function render()
    {

        $gejala = Gejala::query()->paginate(10);

        return view('livewire.gejala.index', [
            'gejala' => $gejala
        ]);
    }
}
