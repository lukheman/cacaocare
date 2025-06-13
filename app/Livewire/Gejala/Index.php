<?php

namespace App\Livewire\Gejala;

use App\Models\Gejala;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public $selected_id; // id penyakit yang ingin dihapus


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
        $this->dispatch('deleteConfirmation', message: 'Yakin untuk menghapus data gejala?');
        $this->selected_id = $id;
    }


    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        Gejala::find($this->selected_id)->delete();
        $this->dispatch('toast', message: 'Data gejala berhasil dihapus', type: 'danger');
        $this->selected_id = null;
    }

    public function render()
    {
        $gejala = Gejala::query()->paginate(10);
        return view('livewire.gejala.index', ['gejala' => $gejala]);
    }
}
