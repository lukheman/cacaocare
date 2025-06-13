<?php

namespace App\Livewire\Admin;

use App\Models\LogDiagnosis;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class LaporanDiagnosisPasien extends Component
{
    use WithPagination;

    public $selected_id; // id penyakit yang ingin dihapus

    public function delete($id) {
        $this->dispatch('deleteConfirmation', message: 'Yakin untuk menghapus data laporan diagnosis pasien?');
        $this->selected_id = $id;
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        LogDiagnosis::query()->find($this->selected_id)->delete();
        $this->dispatch('toast', message: 'Data Laporan diagnosis pasien berhasil dihapus', type: 'danger');
        $this->selected_id = null;
    }

    public function render()
    {

        $log_diagnosis = LogDiagnosis::with('penyakit')->paginate(10);
        return view('livewire.admin.laporan-diagnosis-pasien', ['log_diagnosis' => $log_diagnosis]);
    }
}
