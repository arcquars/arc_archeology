<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="saveHumanRemain">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Crear ficha de restos humanos</div>
            <div class="card-body text-secondary p-2">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="hrc-intervention">Intervención</label>
                        <input type="text" class="form-control form-control-sm @error('intervention') is-invalid @enderror"
                               wire:model="intervention" id="hrc-intervention"
                        >
                        @error('intervention')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="hrc-location">Localización</label>
                        <input type="text" class="form-control form-control-sm @error('location') is-invalid @enderror"
                               wire:model="location" id="hrc-location"
                        >
                        @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="hrc-ue">N. UE</label>
                        <input type="text" class="form-control form-control-sm @error('ue') is-invalid @enderror"
                               wire:model="ue" id="hrc-ue"
                        >
                        @error('ue')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="hrc-fact">Hecho</label>
                        <input type="text" class="form-control form-control-sm @error('fact') is-invalid @enderror"
                               wire:model="fact" id="hrc-fact"
                        >
                        @error('fact')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <div class="custom-control custom-checkbox @error('type_inhumation') is-invalid @enderror">
                            <input class="custom-control-input"
                                   wire:model="type_inhumation" type="checkbox" id="hrc-type_inhumation" value="1"
                            >
                            <label for="hrc-type_inhumation" class="custom-control-label">Inhumación</label>
                        </div>
                        @error('type_inhumation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="custom-control custom-checkbox @error('type_cremation') is-invalid @enderror">
                            <input class="custom-control-input"
                                   wire:model="type_cremation" type="checkbox" id="hrc-type_cremation" value="1"
                            >
                            <label for="hrc-type_cremation" class="custom-control-label">Cremación</label>
                        </div>
                        @error('type_cremation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('close-human-remain-card-create')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Crear</button>
            </div>
        </div>
    </form>
</div>
