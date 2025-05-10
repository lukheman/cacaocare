
<div class="row">

    <div class="col-md-7">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Gejala Penyakit</h4>
                    </div>
                    <div class="col-6 d-flex justify-content-end">

                        <button wire:click="create" class="btn btn-primary me-3">Tambah Gejala</button>

                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                                <th>Bobot</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gejala as $item)

                            <tr wire:key="{{ $item->id }}">
                                <td scope="row">{{ $loop->index + $gejala->firstItem() }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td><span class="badge bg-light-primary">{{ $item->bobot }}</span></td>
                                <td class="text-end">
                                    <button wire:click="edit({{ $item->id }})" class="btn btn-warning" type="button">Edit</button>
                                    <button wire:click="delete({{ $item->id }})" class="btn btn-danger" type="button">Hapus</button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                    <x-pagination :items="$gejala"></x-pagination>
                </div>



            </div>

        </div>


    </div>

    <div class="col-md-5">

        <livewire:gejala.form></livewire:gejala>


    </div>
</div>
