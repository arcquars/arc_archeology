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
                    <h4 class="text-primary">{{ $muralStratigraphy->project->name }}</h4>
                    <h5 class="text-secondary">{{ $muralStratigraphy->id }} - Ficha estratigrafia mural</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('img/semar.png') }}" class="img-thumbnail float-right" alt="Logo semar" width="120">
                </div>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2" style="display: block;">
            <h6 class="bg-primary p-1">IDENTIFICACION</h6>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Fecha</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->msc_date }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Planta</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->floor }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Estancia</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stay }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Cuadrante/Pared</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->quadrant }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Acrónimo</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->acronym }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Hecho</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->fact }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N° UE</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->n_ue }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Datacion provisional</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->provisional_dating }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Fiabilidad estratigráfica</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphic_reliability }}
                    </div>

                </div>
                <div class="col-md-3 form-group">
                    <label>Tipo</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->identification_type }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Conservación</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->preservation }}
                    </div>
                </div>
            </div>
            <h6 class="bg-primary p-1 text-uppercase">Descripción e interpretación</h6>
            <div class="form-control bg-light">
                {{ $muralStratigraphy->description }}
            </div>
            <h6 class="bg-primary p-1 text-uppercase">Componentes</h6>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Piedra</h6>
                    <div class="row">
                        <div class="col md-4 form-group">
                            <label>Tipo</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_stone_type }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Caracteristicas</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_stone_characteristics }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Talla/Trabajo</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_stone_size }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Ladrillo</h6>
                    <div class="row">
                        <div class="col md-4 form-group">
                            <label>Tipo</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_brick_type }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Caracteristicas</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_brick_characteristics }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Medidas</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_brick_measures }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Aglutinante</h6>
                    <div class="row">
                        <div class="col md-4 form-group">
                            <label>Tipo</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_binder_type }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Caracteristicas</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_binder_characteristics }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Juntas</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_binder_joints }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Tapial</h6>
                    <div class="row">
                        <div class="col md-6 form-group">
                            <label>Caja</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_tapial_box }}
                            </div>
                        </div>
                        <div class="col md-6 form-group">
                            <label>Altura de los tablones</label>
                            <div class="form-control bg-light">
                                {{ $muralStratigraphy->component_tapial_height }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="bg-primary p-1 text-uppercase">Estratigrafía</h6>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Igual a</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_equals_to }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Equivale</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_equivalent }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Se le apoya</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_it_is_supported }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Se apoya en</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_rests_on }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Cubierto por</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_covered_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Cubre o se superpone a</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_covers_to }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Relleno por</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_filled_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Rellena a</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_fills_to }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Cortado por</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_cut_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Corta a</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->stratigraphy_cut_to }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Comentario</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->comments }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N. de plano</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->num_flat }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N. Fotografia</label>
                    <div class="form-control bg-light">
                        {{ $muralStratigraphy->num_photography }}
                    </div>
                </div>
            </div>
            @foreach($croquisUrls as $url)
                <img src="{{ $url }}" alt="Imagen desde Wasabi" />
            @endforeach
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('closeViewFieldWork')">Cerrar</button>
        </div>
    </div>
</div>
