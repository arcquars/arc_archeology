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
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->msc_date }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Planta</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->floor }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Estancia</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stay }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Cuadrante/Pared</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->quadrant }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Acrónimo</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->acronym }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Hecho</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->fact }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N° UE</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->n_ue }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Datacion provisional</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->provisional_dating }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Fiabilidad estratigráfica</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphic_reliability }}
                    </div>

                </div>
                <div class="col-md-3 form-group">
                    <label>Tipo</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->identification_type }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Conservación</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->preservation }}
                    </div>
                </div>
            </div>
            <h6 class="bg-primary p-1 text-uppercase">Descripción e interpretación</h6>
            <div class="bg-light border p-2 mt-2 mb-2 text-justify rounded">
                {{ $muralStratigraphy->description }}
            </div>
            <h6 class="bg-primary p-1 text-uppercase">Componentes</h6>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="border-bottom border-dark">Piedra</h6>
                    <div class="row">
                        <div class="col md-4 form-group">
                            <label>Tipo</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                                {{ $muralStratigraphy->component_stone_type }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Caracteristicas</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                                {{ $muralStratigraphy->component_stone_characteristics }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Talla/Trabajo</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
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
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                                {{ $muralStratigraphy->component_brick_type }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Caracteristicas</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                                {{ $muralStratigraphy->component_brick_characteristics }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Medidas</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
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
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                                {{ $muralStratigraphy->component_binder_type }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Caracteristicas</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                                {{ $muralStratigraphy->component_binder_characteristics }}
                            </div>
                        </div>
                        <div class="col md-4 form-group">
                            <label>Juntas</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
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
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                                {{ $muralStratigraphy->component_tapial_box }}
                            </div>
                        </div>
                        <div class="col md-6 form-group">
                            <label>Altura de los tablones</label>
                            <div class="border rounded p-1 bg-light" style="min-height: 30px;">
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
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_equals_to }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Equivale</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_equivalent }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Se le apoya</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_it_is_supported }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Se apoya en</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_rests_on }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Cubierto por</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_covered_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Cubre o se superpone a</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_covers_to }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Relleno por</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_filled_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Rellena a</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_fills_to }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Cortado por</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_cut_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Corta a</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->stratigraphy_cut_to }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <h5>Croquis</h5>
                    <hr class="bg-primary">
                    @foreach($muralStratigraphy->urlCroquisPublicAttribute() as $url => $pUrl)
                        @if(strcmp($pUrl['type'], 'image') == 0)
                            <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                        @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                            <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                            <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                        @else
                            <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                            <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-10">
                    <h5>Fotografias</h5>
                    <hr class="bg-primary">
                    <div class="row">
                        @foreach($muralStratigraphy->urlPhotosPublicAttribute() as $url => $pUrl)
                            <div class="col-md-4">
                                @if(strcmp($pUrl['type'], 'image') == 0)
                                <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                    <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @else
                                    <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Comentario</label>
                    <div class="bg-light border rounded p-1" style="min-height: 30px;">
                        {{ $muralStratigraphy->comments }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N. de plano</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->num_flat }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N. Fotografia</label>
                    <div class="border rounded p-1 bg-light" style="min-height: 30px;">
                        {{ $muralStratigraphy->num_photography }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('closeViewFieldWork')">Cerrar</button>
        </div>
    </div>
</div>
