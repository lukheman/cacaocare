<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <div class="avatar avatar-2xl">
                        <img src="./assets/compiled/jpg/2.jpg" alt="Avatar">
                    </div>

                    <h3 class="mt-3">John Doe</h3>
                    <p class="text-small">Junior Software Engineer</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit="edit">

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input wire:model="form.name" type="text" id="name" class="form-control" placeholder="Your Name">

                        @error('form.name')

                        <small class="d-block mt-1 text-danger">{{ $message }}</small>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input wire:model="form.email" type="text" id="email" class="form-control">

                        @error('form.email')

                        <small class="d-block mt-1 text-danger">{{ $message }}</small>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input wire:model="form.password" type="password" id="password" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation" class="form-label">Konfirmasi Password</label>
                        <input wire:model="form.password_confirmation" type="password" id="password-confirmation" class="form-control" >

                        @error('form.password')

                        <small class="d-block mt-1 text-danger">{{ $message }}</small>

                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
