<?php

namespace App\Livewire\Admin\Penyakit;

use App\Models\Penyakit;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public $selected_id; // id penyakit yang ingin dihapus


    #[On(['penyakitCreated', 'penyakitUpdated'])]
    public function updateList() {
    }

    public function delete($id) {
        $this->dispatch('deleteConfirmation', message: 'Yakin untuk menghapus data penyakit?');
        $this->selected_id = $id;
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        Penyakit::query()->find($this->selected_id)->delete();
        $this->dispatch('toast', message: 'Data Penyakit berhasil dihapus', type: 'danger');
        $this->selected_id = null;
    }


    public function create() {
        $this->dispatch('createPenyakit');
    }

    public function edit($id) {
        $this->dispatch('editPenyakit', $id);
    }

    public function render()
    {

        $penyakit = Penyakit::query()->paginate(5);

        return view('livewire.admin.penyakit.index', [
            'penyakit' => $penyakit
        ]);
    }
}
