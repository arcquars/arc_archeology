<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <div class="card card-outline card-primary mb-2 mt-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="text-primary">{{ $catalogueArchitectural->project->name }}</h4>
                    <h5 class="text-secondary">{{ $catalogueArchitectural->id }} - Elemento arquitectonico</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('img/semar.png') }}" class="img-thumbnail float-right" alt="Logo semar" width="120">
                </div>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2" style="display: block;">



            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Fecha de ingreso</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->proceed_date_admission }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Fuente de ingreso</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->proceed_source_admission }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Procedencia</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->proceed_origin }}
                    </div>
                </div>
                <div class="col-md-3 row">
                    <div class="col-md-6 form-group">
                        <label>Acrónimo</label>
                        <div class="form-control bg-light">
                            {{ $catalogueArchitectural->proceed_acronym }}
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>UE</label>
                        <div class="form-control bg-light">
                            {{ $catalogueArchitectural->proceed_ue }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Clasificación</label>
                <div class="form-control bg-light">
                    {{ $catalogueArchitectural->c_classification }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nombre Común</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->c_common_name }}
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Nombre Específico</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->c_specific_name }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Datación</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->c_dating }}
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Estado integridad</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->c_integrity_status }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Siglas</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->a_acronyms }}
                    </div>
                </div>
                <div class="col-md-8 form-group">
                    <label>Ubicación sigla</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->a_location }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Fecha</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->location_date }}
                    </div>
                </div>
                <div class="col-md-8 form-group">
                    <label>Ubicación</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->location }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Notas</label>
                <div class="form-control bg-light">
                    {{ $catalogueArchitectural->location_notes }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="bg-primary p-1 text-center mb-1">Dimensiones (cm)</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Long</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->dimension_long }}
                    </div>
                </div>


                <div class="col-md-3 form-group">
                    <label>Anch</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->dimension_anch }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Alt</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->dimension_alt }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Otras</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->dimension_other }}
                    </div>
                </div>
            </div>
            <hr class="bg-primary">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Materia</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->subject }}
                    </div>
                </div>
                <div class="col-md-8 form-group">
                    <label>Técnica</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->technique }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <div class="form-control bg-light">
                    {{ $catalogueArchitectural->description }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Estado conservación</label>
                        <div class="form-control bg-light">
                            {{ $catalogueArchitectural->conservation_status }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <div class="form-control bg-light">
                            {{ $catalogueArchitectural->author }}
                        </div>
                    </div>
                </div>
                <div class="col-md-8 form-group">
                    <label>Observaciones</label>
                    <div class="form-control bg-light">
                        {{ $catalogueArchitectural->comments }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('closeViewCatArch')">Cerrar</button>
        </div>
    </div>
</div>
