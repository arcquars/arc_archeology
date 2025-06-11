<div>
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>

        <div class="modal fade show" id="userSearchUnassignModal" tabindex="-1" aria-labelledby="userSearchUnassignModalLabel" style="display: block;" aria-modal="true" role="dialog" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userSearchUnassignModalLabel">Retirar al Usuario del Proyecto ID: {{ $projectId }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="callout callout-danger">
                            <p>Esta seguro que quiere retirar al usuario <b>{{ $user->name }}</b> el proyecto: <b>Proyecto 344 excavacion</b></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" wire:click="closeModal">Cerrar</button>
{{--                        <button type="button" class="btn btn-primary" wire:click="assignUser" @if(!$selectedUserId) disabled @endif>--}}
{{--                            <span wire:loading.remove wire:target="assignUser">Asignar Usuario</span>--}}
{{--                            <span wire:loading wire:target="assignUser">Asignando... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></span>--}}
{{--                        </button>--}}
                        <button type="button" class="btn btn-sm btn-primary" wire:click="unassignedUser">
                            Grabar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
