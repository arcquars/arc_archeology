<div>
    <form wire:submit.prevent="updatePassword">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cambiar Contraseña</h3>
            </div>
            <div class="card-body">

                {{-- Mensaje de éxito --}}
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-group">
                    <label for="current_password">Contraseña Actual</label>
                    <input wire:model.lazy="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" placeholder="Ingresa tu contraseña actual">
                    @error('current_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">Nueva Contraseña</label>
                    <input wire:model.lazy="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Ingresa tu nueva contraseña">
                    @error('new_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirmar Nueva Contraseña</label>
                    <input wire:model.lazy="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" placeholder="Confirma tu nueva contraseña">
                    @error('new_password_confirmation') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
            </div>
        </div>
    </form>
</div>
