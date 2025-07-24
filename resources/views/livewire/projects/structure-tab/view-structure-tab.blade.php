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
        <div class="card-header p-2 text-primary">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="text-primary">{{ $structureTab->project->name }}</h4>
                    <h5 class="text-secondary">{{ $structureTab->i_n_ue }} - Ficha de estructura</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('img/semar.png') }}" class="img-thumbnail float-right" alt="Logo semar" width="120">
                </div>
            </div>
        </div>
        <div class="card-body text-secondary p-2">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="sc-i_date">Fecha</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_date }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_location_intervention">Localización en la intervención</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_location_intervention }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_acronym">Acrónimo</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_acronym }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_n_ue">N. UE</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_n_ue }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="sc-i_fact">Hecho</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_fact }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Datación provisional</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_provisional_dating }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Fiabilidad estratigráfica</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_stratigraphic_reliability }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Tipo</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->i_type }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Conservación</label>
                <div class="form-control bg-light">
                    {{ $structureTab->conservation }}
                </div>
            </div>
            <h5 class="bg-primary p-1 text-center">Descripción e interpretación</h5>
            <div class="row">
                <div class="col-md-6">
                    <label>Descripción</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->interpretation_description }}
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="cfw_photo">Interpretación</label>
                    <hr class="bg-primary mt-1 mb-1">
                    @foreach($structureTab->urlPhotoPublicAttribute() as $url => $pUrl)
                        <div class="d-flex justify-content-center align-items-center">
                        <div class="position-relative d-inline-block">
                            @if(strcmp($pUrl['type'], 'image') == 0)
                                <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                            @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                            @else
                                <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                            @endif
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Aparejo</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->di_rigging }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Largo</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->di_length }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Anchura</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->di_width }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Alto-Grueso</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->di_thick_height }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5 class="bg-primary p-1 text-center mb-1">Orientación en °</h5>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>1 grado</label>
                            <div class="form-control bg-light">
                                {{ $structureTab->di_orientation_degrees_1 }}
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>2 grado</label>
                            <div class="form-control bg-light">
                                {{ $structureTab->di_orientation_degrees_2 }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="bg-primary p-1 text-uppercase text-center">Estratigrafía</h6>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Igual a</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_equals }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Se le apoya</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_support_provided }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Cubierto por</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_covered_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Relleno por</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_filling_by }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Cortado por</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_cut_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Equivale</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_equivale }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Se apoya en</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_supported_by }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Cubre o se superpone a</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_overlaps_or_covers }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Rellena a</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_fill_in }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Corta a</label>
                    <div class="form-control bg-light">
                        {{ $structureTab->stratigraphy_cut_to }}
                    </div>
                </div>
                <div class="col-md-3 form-group"></div>
                <div class="col-md-3 form-group"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="cfw_sketch">Croquis</label>
                    <hr class="bg-primary mb-1 mt-1">
                    <div class="d-flex justify-content-center align-items-center">
                        @foreach($structureTab->urlSketchPublicAttribute() as $url => $pUrl)
                            <div class="position-relative d-inline-block">
                                @if(strcmp($pUrl['type'], 'image') == 0)
                                    <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                    <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @else
                                    <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-6">
                    <h6 class="bg-primary p-1 text-center mb-1">Cotas</h6>
                    @if(count($structureTab->quotes) > 0)
                        <div class="row">
                            @foreach($structureTab->quotes as $index => $quote)
                                <div class="col-md-3">
                                    <h5>Cota #{{ $index + 1 }}</h5>
                                    <dl>
                                        <dt>Superficie</dt>
                                        <dd>{{ $quote->surface }}</dd>

                                        <dt>Información</dt>
                                        <dd>{{ $quote->information }}</dd>
                                    </dl>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @if(count($structureTab->bricks) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="bg-primary p-1 text-center mb-1">DIMENSIONES EN CM DE LOS LADRILLOS (DE PARED O PAVIMENTO), TOMAR COMO MÍNIMO 25 EJEMPLOS DE PIEZAS COMPLETAS (si es posible).</h6>
                    </div>
                </div>
                <div class="row">
                    @foreach($structureTab->bricks as $index => $brick)
                        <div class="col-md-3">
                            <h5>Ladrillo #{{ $index + 1 }}</h5>
                            <p class="m-1"><b>Largo: </b>{{ $brick->long }}</p>
                            <p class="m-1"><b>Ancho: </b>{{ $brick->width }}</p>
                            <p class="m-1"><b>Grueso: </b>{{ $brick->thick }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(count($structureTab->formWorks) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="bg-primary p-1 text-center mb-1">Altura de las tapias</h6>
                    </div>
                </div>
                <div class="row">
                    @foreach($structureTab->formWorks as $index => $formWork)
                        <div class="col-md-3">
                            <h5>Encofrado #{{ $index + 1 }}</h5>
                            <p class="m-1"><b>Encofrado: </b>{{ $formWork->formwork }}</p>
                        </div>
                    @endforeach
                </div>
            @endif


        </div>
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('close-stratum-card-view')">Cerrar</button>
        </div>
    </div>
</div>
