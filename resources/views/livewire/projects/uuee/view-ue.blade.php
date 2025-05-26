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
        <div class="card-header p-2 text-primary">UE - {{ $ue->code }}</div>
        <div class="card-body text-secondary p-2">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="ue_code">UE</label>
                    <div class="form-control bg-light">
                        {{ $ue->code }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="ue_covered_by">Cubierto por</label>
                    <div class="form-control bg-light">
                        {{ $ue->covered_by }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="ue_covers_to">Cubre a</label>
                    <div class="form-control bg-light">
                        {{ $ue->covers_to }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="ue_description">Descripción</label>
                    <div class="form-control bg-light">
                        {{ $ue->description }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="ue_interpreting">Interpretación</label>
                    <div class="form-control bg-light">
                        {{ $ue->interpreting }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="ue_dating">Datacion</label>
                    <div class="form-control bg-light">
                        {{ $ue->dating }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('close-view-ue')">Cerrar</button>
        </div>
    </div>
</div>
