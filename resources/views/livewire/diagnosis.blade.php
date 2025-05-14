<div class="row">

    <div class="col-12">


        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Diagnosis Pasien</h4>
            </div>

            <div class="card-body">




                <div class="row d-flex justify-content-center">
                    <div class="col-8">

                <div class="card" wire:show="!visible">
                    <div class="card-header">
                        <h5 class="text-center"><b>Hasil Diagnosis</b></h5>
                    </div>
                    <div class="card-body">
                        <livewire:hasil-diagnosis></livewire:hasil-diagnosis>
                    </div>

                </div>

                        <div class="card" wire:show="visible">
                            <div class="card-header">
                                <h5 class="text-center"><b>Pilih Gejala</b></h5>
                            </div>
                            <div class="card-body">
                                <form action="">


                                    @foreach ($gejala as $item)
                                    <div class="form-group">

                                        <div class="checkbox form-check form-check-lg">
                                            <input wire:model="id_gejala_terpilih" type="checkbox" id="gejala-{{ $item->id }}" value="{{ $item->id }}" class="form-check-input">
                                            <label for="gejala-{{ $item->id }}" class="ms-2 mt-1">{{ $loop->index+1 . '. '.  $item->nama }}</label>
                                        </div>

                                    </div>
                                    @endforeach


                                    <div class="row mt-5">
                                        <div class="col-12">

                                            <button wire:click="start" class="btn btn-primary" type="button">Diagnosis</button>

                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>





            </div>

        </div>


    </div>

</div>
