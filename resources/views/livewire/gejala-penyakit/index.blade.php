<div class="row">

    <div class="col-md-7">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Gejala Penyakit</h4>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Penyakit</th>
                                <th>Penyakit</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rules as $item)

                            <tr wire:key="{{ $item->id }}">
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="d-flex justify-content-end">
                                    <button wire:click="show({{ $item->id }})" class="btn me-2  btn-primary" type="button">Lihat Gejala</button>

                                    <button wire:show="showEditButton" wire:click="edit({{ $item->id }})" class="btn btn-warning" type="button">Edit Gejala</button>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>



            </div>

        </div>


    </div>

    <div class="col-md-5">

        @if ($state === 'show')
            <livewire:gejala-penyakit.show :id_penyakit="$id_penyakit"></livewire:gejala-penyakit>
        @elseif($state === 'edit')
            <livewire:gejala-penyakit.edit :id_penyakit="$id_penyakit"></livewire:gejala-penyakit>
        @endif

    </div>

</div>
