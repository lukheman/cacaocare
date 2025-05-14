<div class="row min-vh-100 justify-content-center align-items-center">
    <div class="col-md-3">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">{{ config('app.name')}}</h4>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <h4 class="card-title">Registrasi</h4>
                    </div>
                </div>
            </div>

                <div class="card-body">

                    <form class="form form-horizontal" wire:submit="regis">
                        <div class="form-body">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input wire:model="form.name" type="text" id="name" class="form-control"placeholder="Nama Anda">
                                    @error('form.name')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email-horizontal">Email</label>
                                    <input wire:model="form.email" type="email" id="email-horizontal" class="form-control" name="email" placeholder="Email">
                                    @error('form.email')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-horizontal">Password</label>
                                    <input wire:model="form.password" type="password" id="password-horizontal" class="form-control" name="password" placeholder="Password">

                                    @error('form.password')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-horizontal">Konfirmasi Password</label>
                                    <input wire:model="form.password_confirmation" type="password" id="password-horizontal" class="form-control" placeholder="Ulangi Password">

                                    @error('form.password')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>


                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Registrasi</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>

