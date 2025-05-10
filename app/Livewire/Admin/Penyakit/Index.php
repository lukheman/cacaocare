<?php

namespace App\Livewire\Admin\Penyakit;

use App\Models\Penyakit;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;


    #[On(['penyakitCreated', 'penyakitUpdated'])]
    public function updateList() {
    }

    public function delete($id) {
        Penyakit::query()->find($id)->delete();
        $this->dispatch('toast', message: 'Data Penyakit berhasil dihapus', type: 'danger');
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
