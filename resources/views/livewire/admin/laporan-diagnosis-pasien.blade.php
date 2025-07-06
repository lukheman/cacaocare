<div class="row">

    <!-- <div class="page-heading"> -->
    <!--     <h3>Laporan Gejala Penyakit</h3> -->
    <!-- </div> -->
    <div class="modal modal-lg fade text-left modal-borderless" id="border-less" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Laporan Diagnosis</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($selected_log_diagnosis)
                                        @foreach ($selected_log_diagnosis->gejala as $gejala)
                                        <tr>

                                            <td>{{ $gejala->kode}}</td>
                                            <td>{{ $gejala->nama}}</td>

                                        </tr>
                                        @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Kepercayaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($selected_log_diagnosis)
                                        @foreach ($selected_log_diagnosis->penyakit as $penyakit)
                                        <tr>

                                            <td>{{ $penyakit->kode}}</td>
                                            <td>{{ $penyakit->nama}}</td>
                                            <td><span class="badge bg-success">{{ $penyakit->pivot->belief}}%</span></td>

                                        </tr>
                                        @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">


                <h4 class="card-title">Laporan Diagnosis Pasien</h4>


            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col">

                        <a href="{{ route('laporan-diagnosis-pasien')}}" class="btn btn-outline-danger">Cetak Semua Diagnosis Pasien</a>
                    </div>
                    <div class="col">

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($log_diagnosis as $item)
                            <tr>
                                <td>{{ $loop->index + $log_diagnosis->firstItem()}}</td>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->umur}}</td>
                                <td class="text-end">
                                    <button  wire:click="view({{$item->id}})" type="button" data-bs-target="#border-less" data-bs-toggle="modal" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i> Detail</button>
                                    <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Hapus</button>
                                    <form class="d-inline" action="{{ route('laporan-diagnosis-satu-pasien')}}" method="post">
                                        @csrf

                                        <input type="hidden" name="id_log_diagnosis" value="{{ $item->id }}">

                                        <button class="btn btn-sm btn-outline-danger"><i class="fa fa-print"></i> Cetak</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                    <x-pagination :items="$log_diagnosis"></x-pagination>
                </div>
            </div>
        </div>


    </div>

</div>
