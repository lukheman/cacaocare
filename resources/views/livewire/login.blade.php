<div class="row justify-content-center align-items-center">
    <div class="col-lg-4 col-md-6">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">SiLambung</h4>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <h4 class="card-title">Masuk</h4>
                    </div>
                </div>
            </div>

                <div class="card-body">

                        <x-flash-message />

                    <form class="form form-horizontal" wire:submit="login">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="email-horizontal">Email</label>
                                    <input wire:model="form.email" type="email" id="email-horizontal" class="form-control" name="email" placeholder="Email">
                                    @error('email')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password-horizontal">Password</label>
                                    <input wire:model="form.password" type="password" id="password-horizontal" class="form-control" name="password" placeholder="Password">

                                    @error('password')

                                    <small class="d-block mt-1 text-danger">{{ $message }}</small>

                                    @enderror
                                </div>


                                <div class="col-sm-12 d-flex justify-content-end">

                                    <button type="submit" class="btn btn-primary me-1 mb-1">Masuk</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>

