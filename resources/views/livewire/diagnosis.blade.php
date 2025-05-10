<div class="row">

    <div class="col-8">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Diagnosis Pasien</h4>
            </div>

            <div class="card-body">

                <p class="text-center"><b>Pilih Gejala</b></p>

                <form action="">

                    <div class="row">
                        <div class="col-6">

                            @foreach ($gejala as $item)
                            <div class="form-group">

                                <div class="checkbox form-check form-check-lg">
                                    <input wire:model="id_gejala_terpilih" type="checkbox" id="gejala-{{ $item->id }}" value="{{ $item->id }}" class="form-check-input">
                                    <label for="gejala-{{ $item->id }}" class="ms-2 mt-1">{{ $loop->index+1 . '. '.  $item->nama }}</label>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>

                </form>

                <div class="row">
                    <div class="col-12 d-flex justify-content-end">

                        <button wire:click="start" class="btn btn-primary" type="button">Diagnosis</button>

                    </div>
                </div>


            </div>

        </div>


    </div>

</div>
