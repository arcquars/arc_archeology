<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <div class="card border border-primary mb-2 mt-2">
        <div class="card-header p-2 text-primary">Ficha de estrato - {{ $stratumCard->i_n_ue }}</div>
        <div class="card-body text-secondary p-2">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="sc-i_date">Fecha</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_date }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_location_intervention">Localización en la intervención</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_location_intervention }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_acronym">Acrónimo</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_acronym }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_n_ue">N. UE</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_n_ue }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="sc-i_fact">Hecho</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_fact }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('close-stratum-card-view')">Cerrar</button>
        </div>
    </div>
</div>
