<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="updateUe" enctype="multipart/form-data">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Actualizar UE</div>
            <div class="card-body text-secondary p-2">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="ue_code">UE</label>
                        <input type="text" class="form-control form-control-sm @error('code') is-invalid @enderror"
                               wire:model="code" id="ue_code"
                        >
                        @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ue_covered_by">Cubierto por</label>
                        <input type="text" class="form-control form-control-sm @error('covered_by') is-invalid @enderror"
                               wire:model="covered_by" id="ue_covered_by"
                        >
                        @error('covered_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ue_covers_to">Cubre a</label>
                        <input type="text" class="form-control form-control-sm @error('covers_to') is-invalid @enderror"
                               wire:model="covers_to" id="ue_covers_to"
                        >
                        @error('covers_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="ue_description">Descripción</label>
                        <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror"
                               wire:model="description" id="ue_description"
                        >
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ue_interpreting">Interpretación</label>
                        <input type="text" class="form-control form-control-sm @error('interpreting') is-invalid @enderror"
                               wire:model="interpreting" id="ue_interpreting"
                        >
                        @error('interpreting')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ue_dating">Datacion</label>
                        <input type="text" class="form-control form-control-sm @error('dating') is-invalid @enderror"
                               wire:model="dating" id="ue_dating"
                        >
                        @error('dating')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('close-ue-update')">Cerrar</button>
                <button class="btn btn-sm btn-primary" type="submit">Grabar</button>
            </div>
        </div>
    </form>
</div>
