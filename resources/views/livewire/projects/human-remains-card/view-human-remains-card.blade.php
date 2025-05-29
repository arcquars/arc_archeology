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
        <div class="card-header p-2 text-primary">Ficha de restos humanos - {{ $humanRemainCard->ue }}</div>
        <div class="card-body text-secondary p-2">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Intervención</label>
                    <div class="form-control bg-light">
                        {{ $humanRemainCard->intervention }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Localización</label>
                    <div class="form-control bg-light">
                        {{ $humanRemainCard->location }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N. UE</label>
                    <div class="form-control bg-light">
                        {{ $humanRemainCard->ue }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Hecho</label>
                    <div class="form-control bg-light">
                        {{ $humanRemainCard->fact }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>@if($humanRemainCard->type_inhumation) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Inhumación</label>
                </div>
                <div class="col-md-3 form-group">
                    <label>@if($humanRemainCard->type_cremation) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Cremación</label>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('close-stratum-card-view')">Cerrar</button>
        </div>
    </div>
</div>
