<div>
    <div class="modal fade @if($show) show @endif" id="ueCreateModal" tabindex="-1" role="dialog" aria-labelledby="ueCreateModalLabel" aria-hidden="@if(!$show) true @else false @endif" style="@if($show) display: block; @endif">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="saveUe">
                <input type="hidden" class="@error('project_id') is-invalid @enderror" wire:model="project_id">
                @error('project_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ueCreateModalLabel">Crear UE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-group-sm">
                            <label for="ueCode" class="form-label">Codigo</label>
                            <input type="text" class="form-control form-control-sm @error('code') is-invalid @enderror" id="ueCode" wire:model="code">
                            @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="ueCoveredBy" class="form-label">Cubierto por</label>
                                <input type="text" class="form-control form-control-sm @error('covered_by') is-invalid @enderror" id="ueCoveredBy" wire:model="covered_by">
                                @error('covered_by')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="ueCoversTo" class="form-label">Cubre a</label>
                                <input type="text" class="form-control form-control-sm @error('covers_to') is-invalid @enderror" id="ueCoversTo" wire:model="covers_to">
                                @error('covers_to')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="ueDating" class="form-label">Datacion</label>
                                <input type="text" class="form-control form-control-sm @error('dating') is-invalid @enderror" id="ueDating" wire:model="dating">
                                @error('dating')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="ueInterpreting" class="form-label">Interpretacion</label>
                                <input type="text" class="form-control form-control-sm @error('interpreting') is-invalid @enderror" id="ueInterpreting" wire:model="interpreting">
                                @error('interpreting')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="ueDescription" class="form-label">Descripcion</label>
                            <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" id="ueDescription" wire:model="description">
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" wire:click="closeModal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary" >Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (session()->has('mensaje'))
        <div class="alert alert-success mt-3">
            {{ session('mensaje') }}
        </div>
    @endif

</div>
