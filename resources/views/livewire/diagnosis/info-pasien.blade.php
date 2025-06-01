<div class="card">
    <div class="card-header">
        <h5 class="text-center"><b>Masukan data diri Anda</b></h5>
    </div>
    <div class="card-body">

        <div class="form-group">
            <label for="nama">Nama</label>
            <input wire:model="nama" type="text" class="form-control" id="nama">

            @error('nama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="umur">Umur (Tahun)</label>
            <input wire:model="umur" type="number" class="form-control" id="umur" min="1">

            @error('umur')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button wire:click="nextStep" class="btn btn-primary" type="button">Lanjut</button>
    </div>
</div>


