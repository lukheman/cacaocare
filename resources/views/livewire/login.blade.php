<div class="row min-vh-100 justify-content-center align-items-center">
    <div class="col-md-3">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">{{ config('app.name')}}</h4>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <h4 class="card-title">Login</h4>
                    </div>
                </div>
            </div>

                <div class="card-body">

                <p class="text-center">Belum punya akun, silahkan <a href="{{ route('registrasi')}}">registrasi</a></p>

                        <x-flash-message />

                    <form class="form form-horizontal" wire:submit="login">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email-horizontal">Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input wire:model="form.email" type="email" id="email-horizontal" class="form-control" name="email" placeholder="Email">
                                    @error('email')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="password-horizontal">Password</label>

                                </div>
                                <div class="col-md-8 form-group">
                                    <input wire:model="form.password" type="password" id="password-horizontal" class="form-control" name="password" placeholder="Password">

                                    @error('password')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>


                                <div class="col-sm-12 d-flex justify-content-end">

                                    <a  href="{{ route('landing')}}" class="btn btn-success me-1 mb-1">Home</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>

