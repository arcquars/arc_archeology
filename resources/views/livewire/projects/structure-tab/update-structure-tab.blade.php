<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="updateStructureTab">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Actualizar ficha de estructura</div>
            <div class="card-body text-secondary p-2">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="sc-i-date">Fecha</label>
                        <input type="date" class="form-control form-control-sm @error('i_date') is-invalid @enderror"
                               wire:model="i_date" id="sc-i-date"
                        >
                        @error('i_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sc-i_location_intervention">Localización en la intervención</label>
                        <input type="text" class="form-control form-control-sm @error('i_location_intervention') is-invalid @enderror"
                               wire:model="i_location_intervention" id="sc-i_location_intervention"
                        >
                        @error('i_location_intervention')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sc-i_acronym">Acrónimo</label>
                        <input type="text" class="form-control form-control-sm @error('i_acronym') is-invalid @enderror"
                               wire:model="i_acronym" id="sc-i_acronym"
                        >
                        @error('i_acronym')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sc-i_n_ue">N. UE</label>
                        <input type="text" class="form-control form-control-sm @error('i_n_ue') is-invalid @enderror"
                               wire:model="i_n_ue" id="sc-i_n_ue"
                        >
                        @error('i_n_ue')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="sc-i_fact">Hecho</label>
                        <input type="text" class="form-control form-control-sm @error('i_fact') is-invalid @enderror"
                               wire:model="i_fact" id="sc-i_fact"
                        >
                        @error('i_fact')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('close-structure-tab-update')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Grabar</button>
            </div>
        </div>
    </form>
</div>
