<div>
    <button wire:click="$dispatch('mostrarModal', { mensaje: '¿Eliminar este registro?' })" class="btn btn-danger">Mostrar Modal de Eliminación</button>
    <button wire:click="$dispatch('mostrarModal', { mensaje: 'Información importante.' })" class="btn btn-info ml-2">Mostrar Modal de Información</button>

    <div class="modal fade @if($mostrarModal) show @endif" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="@if(!$mostrarModal) true @else false @endif" style="@if($mostrarModal) display: block; @endif">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" wire:click="cerrarModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $mensajeModal }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="cerrarModal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="confirmarAccion">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('mensaje'))
        <div class="alert alert-success mt-3">
            {{ session('mensaje') }}
        </div>
    @endif
</div>
