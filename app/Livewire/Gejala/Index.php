<?php

namespace App\Livewire\Gejala;

use App\Models\Gejala;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;


    #[On(['gejalaCreated', 'gejalaUpdated'])]
    public function updateList() {
    }

    public function edit($id) {

        $this->dispatch('editGejala', $id);

    }

    public function create() {
        $this->dispatch('createGejala');
    }

    public function delete($id) {
        Gejala::find($id)->delete();
        $this->dispatch('toast', message: 'Data penyakit berhasil dihapus', type: 'danger');
    }

    public function render()
    {
        $gejala = Gejala::query()->paginate(10);
        return view('livewire.gejala.index', ['gejala' => $gejala]);
    }
}
