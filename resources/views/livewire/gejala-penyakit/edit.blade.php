<div class="card"">

    <div class="card-header">
        <div class="row">

                <h4 class="card-title">Edit Gejala Penyakit {{ $nama_penyakit ?? ''}}</h4>


        </div>

    </div>

    <div class="card-body">

        <form>

            <ul class="list-unstyled">
                @if (isset($gejala_penyakit_all))


                @foreach ($gejala_penyakit_all as $gejala)

                <li class="mb-2">
                    <div class="checkbox form-check form-check-lg">
                        <input wire:model="id_gejala_terpilih" id="gejala-{{ $gejala->id }}" value="{{ $gejala->id }}" type="checkbox" class="form-check-input">
                        <label for="gejala-{{ $gejala->id }}" class="ms-2 mt-1"> {{ $gejala->kode . ' - ' . $gejala->nama }} </label>
                    </div>
                </li>

                @endforeach

                @endif
            </ul>


            <div class="row">

                <div class="col-12 d-flex justify-content-end">

                    <button wire:click="updateGejala" class="btn btn-warning" type="button">Simpan Perubahan</button>

                </div>
            </div>
        </form>

    </div>



</div>
