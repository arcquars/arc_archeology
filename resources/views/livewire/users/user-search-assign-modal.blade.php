<div>
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>

        <div class="modal fade show" id="userSearchAssignModal" tabindex="-1" aria-labelledby="userSearchAssignModalLabel" style="display: block;" aria-modal="true" role="dialog" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userSearchAssignModalLabel">Buscar y Asignar Usuario al Proyecto ID: {{ $projectId }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session()->has('info'))
                            <div class="alert alert-info">{{ session('info') }}</div>
                        @endif

                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="rol-e" name="role"
                                   wire:model="role" value="editor"
                            >
                            <label for="rol-e" class="custom-control-label">Editor</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="rol-a" name="role"
                                   wire:model="role" value="admin"
                            >
                            <label for="rol-a" class="custom-control-label">Administrador</label>
                        </div>
                        <div class="mb-3">
                            <label for="searchTerm" class="form-label">Buscar Usuario (Nombre o Email)</label>
                            <input type="text" class="form-control" id="searchTerm" wire:model.live.debounce.300ms="searchTerm" placeholder="Escribe al menos 2 caracteres...">
                            <div wire:loading wire:target="searchTerm" class="text-muted small mt-1">Buscando...</div>
                        </div>

                        @if(!empty($searchTerm) && count($users) > 0)
                            <ul class="list-group">
                                @foreach($users as $user)
                                    <li class="list-group-item list-group-item-action" wire:click="selectUser({{ $user->id }})" style="cursor: pointer;">
                                        <strong>{{ $user->name }}</strong> ({{ $user->email }})
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if($selectedUserId)
                            <div class="mt-3 p-2 bg-light border rounded">
                                Usuario seleccionado: <strong>{{ $selectedUserName }}</strong> (ID: {{ $selectedUserId }})
                            </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cerrar</button>
                        <button type="button" class="btn btn-primary" wire:click="assignUser" @if(!$selectedUserId) disabled @endif>
                            <span wire:loading.remove wire:target="assignUser">Asignar Usuario</span>
                            <span wire:loading wire:target="assignUser">Asignando... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
