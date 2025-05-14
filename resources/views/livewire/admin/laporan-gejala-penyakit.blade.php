<div class="row">

    <!-- <div class="page-heading"> -->
    <!--     <h3>Laporan Gejala Penyakit</h3> -->
    <!-- </div> -->

    <div class="col-12">
        <div class="card">
            <div class="card-header">


                <h4 class="card-title">Laporan Gejala Penyakit</h4>



            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col">

                        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-laporan">Cetak Laporan Gejala Penyakit</button>
                    </div>
                    <div class="col">

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="col-12">

    <livewire:gejala-penyakit.index :showEditButton="false" />
    </div>



    <div class="modal fade" id="modal-laporan" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Laporan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('laporan-gejala-penyakit')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="penyakit">Penyakit</label>
                            <select name="id_penyakit" id="penyakit" class="choices form-select">
                                <option value="">Pilih Penyakit</option>

                                @foreach ($penyakit as $item)
                                <option value="{{ $item->id }}">{{ $item->kode }} | {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fa-solid fa-print"></i> Cetak</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>

