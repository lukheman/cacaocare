<div class="card">

    <div class="card-header">
        @if ($state === 'edit')
        <h4 class="card-title">Edit Gejala Penyakit</h4>
        @elseif($state === 'create')
        <h4 class="card-title">Tambah Gejala Penyakit</h4>
        @endif
    </div>

    <div class="card-body">

        <form>

            <div class="row">
                <div class="col-6">

                    <div class="form-group">

                        <label for="kode">Kode Gejala</label>
                        <input wire:model="form.kode" type="text" class="form-control" id="kode">

                        @error('form.kode')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                </div>
                <div class="col-6">

                    <div class="form-group">

                        <label for="bobot">Bobot</label>
                        <input wire:model="form.bobot" step="0.01" type="number" class="form-control" id="bobot">

                        @error('form.bobot')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">

                    <div class="form-group">

                        <label for="nama">Nama</label>
                        <input wire:model="form.nama" step="0.01" type="text" class="form-control" id="nama">

                        @error('form.nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 d-flex justify-content-end">

                    @if ($state === 'edit')
                        <button wire:click="update" class="btn btn-warning" type="button">Simpan Perubahan</button>
                    @elseif($state === 'create')
                    <button wire:click="save" class="btn btn-primary" type="button">Tambahkan</button>
                    @endif

                </div>
            </div>

        </form>

    </div>
</div>
