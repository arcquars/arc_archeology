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
                    <h4 class="text-primary">{{ $humanRemainCard->project->name }}</h4>
                    <h5 class="text-secondary">{{ $humanRemainCard->ue }} - Ficha de restos humanos</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('img/semar.png') }}" class="img-thumbnail float-right" alt="Logo semar" width="120">
                </div>
            </div>

        </div>
        <div class="card-body text-secondary p-2">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Intervención</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->intervention }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Localización</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->location }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>N. UE</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->ue }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Hecho</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->fact }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tipo</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->type_inhumation) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Inhumación</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->type_cremation) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Cremación</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Asociado a</label>
                    <div class="form-control form-control-sm bg-light">
                      {{ $humanRemainCard->associated_with }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="hrc-description">Descripcion</label>
                <div class="form-control form-control-sm bg-light">{{ $humanRemainCard->description }}</div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Deposición</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->deposition_primary) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Primaria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->deposition_secondary) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Secundaria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->deposition_ossuary) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Osario</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Contexto</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->context_undertaker) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Funerario</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->context_secondary) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Secundaria</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Conservación</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->conservation_good) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Buena</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->conservation_partial_alterations) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Alteraciones parciales</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->conservation_totally_altered) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Totalmente alterado</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sepultura</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->burial_single_grave) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif En fosa individual</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>@if($humanRemainCard->burial_communal_grave) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif En fosa colectiva</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="bg-primary p-1 text-center mb-1">Relaciones</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Igual a</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_equals }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Se le adosa</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_attached }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Cubierto por</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_covered_by }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Relleno por</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_filling_by }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Cortado por</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_cut_by }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Equivale a</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_equivalent_to }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Se adosa a</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_attached_to }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Cubre a</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_covers_to }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Rellena a</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_fill_to }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Corta a</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->relationship_cut_to }}
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>
            <hr class="bg-primary">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Periodización</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->periodization }}
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Datación provisional</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->provisional_dating }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Interpretación</label>
                <div class="form-control form-control-sm bg-light">
                    {{ $humanRemainCard->interpretation }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="cfw_file_topographic">Archivo topográfico</label>
                    @if($humanRemainCard)
                        @foreach($humanRemainCard->urlFileTopographicPublicAttribute() as $url)
                            <div class="position-relative d-inline-block">
                                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="cfw_file_photographic">Archivo fotográfico</label>
                    @if($humanRemainCard)
                        @foreach($humanRemainCard->urlFilePhotographicPublicAttribute() as $url)
                            <div class="position-relative d-inline-block">
                                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Fechas</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->dates }}
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Autor</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->author }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="cfw-sketch">Croquis inhumación (orientación y posición)</label>
                    @if($humanRemainCard)
                        @foreach($humanRemainCard->urlSketchPublicAttribute() as $url)
                            <div class="position-relative d-inline-block">
                                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />

                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="cfw-preserved_part">Parte conservada</label>
                    @if($humanRemainCard)
                        @foreach($humanRemainCard->urlPreservedPartPublicAttribute() as $url)
                            <div class="position-relative d-inline-block">
                                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label>Observaciones antropológicas</label>
                <div class="form-control form-control-sm bg-light">
                    {{ $humanRemainCard->description }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Disposición</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->disposition_decubito_supino) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Decúbito supino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->disposition_decubito_lateral_der) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Decúbito lateral derecho</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->disposition_decubito_lateral_izq) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Decúbito lateral izquierdo</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Deposito</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->deposito_adorno_per) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Adorno personal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->deposito_ceramica) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Cerámica</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->deposito_armamento) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Armamento</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->deposito_fauna) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Fauna</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>@if($humanRemainCard->deposito_semillas) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif Semillas</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="bg-info p-1 text-center mb-1">Brazos</h6>
                    <div class="row">
                        <div class="col-md-8"><p><b>Posición</b></p></div>
                        <div class="col-md-2 text-center"><p><b>Izq</b></p></div>
                        <div class="col-md-2 text-center"><p><b>Der</b></p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">Extendido a lo largo del cuerpo</div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->brazos_ext_largo_cuerpo_izq) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->brazos_ext_largo_cuerpo_der) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">Sobre pelvis</div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->brazos_sobre_pelvis_izq) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->brazos_sobre_pelvis_der) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">Sobre el pecho</div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->brazos_sobre_pecho_izq) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->brazos_sobre_pecho_der) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="bg-info p-1 text-center mb-1">Piernas</h6>
                    <div class="row">
                        <div class="col-md-8"><p><b>Posición</b></p></div>
                        <div class="col-md-2 text-center"><p><b>Izq</b></p></div>
                        <div class="col-md-2 text-center"><p><b>Der</b></p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">Extendida</div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->piernas_ext_izq) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->piernas_ext_der) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">Semi-flexionada</div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->piernas_semi_flex_izq) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->piernas_semi_flex_der) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">Flexionada</div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->piernas_flexionada_izq) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                        <div class="col-md-2 text-center">
                            <label>@if($humanRemainCard->piernas_flexionada_der) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Observaciones antropológicas</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->obs_antropologicas }}
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="hrc-specify">Especificar</label>
                    <div class="form-control form-control-sm bg-light">
                        {{ $humanRemainCard->specify }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="hrc-observations">OBSERVACIONES</label>
                <div class="form-control form-control-sm bg-light">
                    {{ $humanRemainCard->observations }}
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('close-human-remain-card-view')">Cerrar</button>
        </div>
    </div>
</div>
