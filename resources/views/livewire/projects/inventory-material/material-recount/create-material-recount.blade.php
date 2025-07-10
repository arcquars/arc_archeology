<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="saveMaterialRecount">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Crear Material Recuento</div>
            <div class="card-body text-secondary p-2">
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label for="imm-ue">UE</label>
                        <input type="text" class="form-control form-control-sm @error('ue') is-invalid @enderror"
                               wire:model="ue" id="imm-ue" @if(!$enableUe) disabled @endif
                        >
                        @error('ue')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-10 form-group">
                        <label for="imm-object">Cronología</label>
                        <input type="text" class="form-control form-control-sm @error('chronology') is-invalid @enderror"
                               wire:model="chronology" id="imm-chronology"
                        >
                        @error('chronology')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('closeCreateMaterialRecount')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Crear</button>
            </div>
        </div>
    </form>
</div>
