<div class="card">

    <div class="card-header">
        <h4 class="card-title">Tambah Penyakit</h4>
    </div>

    <div class="card-body">

        <form>

            <div class="row">
                <div class="col-4">

                    <div class="form-group">

                        <label for="kode">Kode Penyakit</label>
                        <input wire:model="form.kode" type="text" class="form-control" id="kode">

                        @error('form.kode')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                </div>
                <div class="col-8">

                    <div class="form-group">

                        <label for="nama">Nama Penyakit</label>
                        <input wire:model="form.nama" type="text" class="form-control" id="nama">

                        @error('form.nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="form-group">
                        <label for="deskripsi">Desripsi</label>
                        <textarea wire:model="form.deskripsi" class="form-control" id="deskripsi" rows="5"></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="solusi">Solusi</label>
                        <textarea wire:model="form.solusi" class="form-control" id="solusi" rows="5"></textarea>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-12 d-flex justify-content-end">

                    @if ($state === 'create')
                    <button wire:click="save" class="btn btn-primary" type="button">Tambahkan</button>
                    @elseif($state === 'edit')
                    <button wire:click="update" class="btn btn-warning" type="button">Simpan Perubahan</button>
                    @endif

                </div>
            </div>

        </form>

    </div>
</div>
