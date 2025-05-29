<div>
    <div class="modal fade @if($show) show @endif" id="updateProjectModal" tabindex="-1" role="dialog" aria-labelledby="updateProjectModalLabel" aria-hidden="@if(!$show) true @else false @endif" style="@if($show) display: block; @endif">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="updateProject">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProjectModalLabel">Editar Proyecto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-group-sm">
                            <label for="up-name" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                   id="up-name" wire:model="name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="acronym" class="form-label">Acronimo</label>
                                <input type="text" class="form-control form-control-sm @error('acronym') is-invalid @enderror" id="acronym" wire:model="acronym">
                                @error('acronym')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="expedient" class="form-label"># Expediente</label>
                                <input type="text" class="form-control form-control-sm @error('expedient') is-invalid @enderror" id="expedient" wire:model="expedient">
                                @error('expedient')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="initial_quota" class="form-label">Cuota inicial</label>
                                <input type="number" class="form-control form-control-sm @error('initial_quota') is-invalid @enderror" id="initial_quota" wire:model="initial_quota" step="0.01">
                                @error('initial_quota')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="final_quota" class="form-label">Cuota Final</label>
                                <input type="number" class="form-control form-control-sm @error('final_quota') is-invalid @enderror" id="final_quota" wire:model="final_quota" step="0.01">
                                @error('final_quota')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="initialDate" class="form-label">Fecha de inicio</label>
                                <input type="date" class="form-control form-control-sm @error('initial_date') is-invalid @enderror" id="initialDate" wire:model="initial_date">
                                @error('initial_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group form-group-sm">
                                <label for="utm" class="form-label">UTM</label>
                                <input type="text" class="form-control form-control-sm @error('utm') is-invalid @enderror" id="utm" wire:model="utm">
                                @error('utm')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" wire:click="closeModal">Cancelar</button>
                        <button type="submit" class="btn btn-sm btn-primary" >Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{--    @if (session()->has('mensaje'))--}}
{{--        <div class="alert alert-success mt-3">--}}
{{--            {{ session('mensaje') }}--}}
{{--        </div>--}}
{{--    @endif--}}

</div>
