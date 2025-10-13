<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="updateHumanRemainCard">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Editar ficha de restos humanos</div>
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
                               wire:model="ue" id="hrc-ue" disabled
                        >
                        @error('ue')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="hrc-fact">Sector</label>
                        <input type="text" class="form-control form-control-sm @error('fact') is-invalid @enderror"
                               wire:model="fact" id="hrc-fact"
                        >
                        @error('fact')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Tipo</label>
                        <div>
                            <div class="form-check form-check-inline @error('type_inhumation') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-type_inhumation" value="1"
                                       wire:model="type_inhumation" @if($type_inhumation) checked @endif
                                >
                                <label class="form-check-label" for="c-type_inhumation">Inhumación</label>
                            </div>
                            @error('type_inhumation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check form-check-inline @error('type_cremation') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-type_cremation" value="1"
                                       wire:model="type_cremation" @if($type_cremation) checked @endif
                                >
                                <label class="form-check-label" for="c-type_cremation">Cremación</label>
                            </div>
                            @error('type_cremation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="hrc-associated_with">Asociado a</label>
                        <input type="text" class="form-control form-control-sm @error('associated_with') is-invalid @enderror"
                               id="hrc-associated_with" wire:model="associated_with" />
                        @error('associated_with')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="hrc-description">Descripcion</label>
                    <textarea class="form-control form-control-sm @error('description') is-invalid @enderror"
                              id="hrc-description" wire:model="description" rows="3" ></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Deposición</label>
                            <div>
                                <div class="form-check form-check-inline @error('deposition_primary') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-deposition_primary" value="1"
                                           wire:model="deposition_primary" @if($deposition_primary) checked @endif
                                    >
                                    <label class="form-check-label" for="c-deposition_primary">Primaria</label>
                                </div>
                                @error('deposition_primary')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check form-check-inline @error('deposition_secondary') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-deposition_secondary" value="1"
                                           wire:model="deposition_secondary" @if($deposition_secondary) checked @endif
                                    >
                                    <label class="form-check-label" for="c-deposition_secondary">Secundaria</label>
                                </div>
                                @error('deposition_secondary')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check form-check-inline @error('deposition_ossuary') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-deposition_ossuary" value="1"
                                           wire:model="deposition_ossuary" @if($deposition_ossuary) checked @endif
                                    >
                                    <label class="form-check-label" for="c-deposition_ossuary">Osario</label>
                                </div>
                                @error('deposition_ossuary')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contexto</label>
                            <div>
                                <div class="form-check form-check-inline @error('context_undertaker') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-context_undertaker" value="1"
                                           wire:model="context_undertaker" @if($context_undertaker) checked @endif
                                    >
                                    <label class="form-check-label" for="c-context_undertaker">Funerario</label>
                                </div>
                                @error('context_undertaker')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check form-check-inline @error('context_secondary') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-context_secondary" value="1"
                                           wire:model="context_secondary" @if($context_secondary) checked @endif
                                    >
                                    <label class="form-check-label" for="c-context_secondary">Secundaria</label>
                                </div>
                                @error('context_secondary')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Conservación</label>
                            <div>
                                <div class="form-check form-check-inline @error('conservation_good') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-conservation_good" value="1"
                                           wire:model="conservation_good" @if($conservation_good) checked @endif
                                    >
                                    <label class="form-check-label" for="c-conservation_good">Buena</label>
                                </div>
                                @error('conservation_good')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check form-check-inline @error('conservation_partial_alterations') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-conservation_partial_alterations" value="1"
                                           wire:model="conservation_partial_alterations" @if($conservation_partial_alterations) checked @endif
                                    >
                                    <label class="form-check-label" for="c-conservation_partial_alterations">Alteraciones parciales</label>
                                </div>
                                @error('conservation_partial_alterations')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check form-check-inline @error('conservation_totally_altered') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-conservation_totally_altered" value="1"
                                           wire:model="conservation_totally_altered" @if($conservation_totally_altered) checked @endif
                                    >
                                    <label class="form-check-label" for="c-conservation_totally_altered">Totalmente alterado</label>
                                </div>
                                @error('conservation_totally_altered')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sepultura</label>
                            <div>
                                <div class="form-check form-check-inline @error('burial_single_grave') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-burial_single_grave" value="1"
                                           wire:model="burial_single_grave" @if($burial_single_grave) checked @endif
                                    >
                                    <label class="form-check-label" for="c-burial_single_grave">En fosa individual</label>
                                </div>
                                @error('burial_single_grave')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check form-check-inline @error('burial_communal_grave') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" id="c-burial_communal_grave" value="1"
                                           wire:model="burial_communal_grave" @if($burial_communal_grave) checked @endif
                                    >
                                    <label class="form-check-label" for="c-burial_communal_grave">En fosa colectiva</label>
                                </div>
                                @error('burial_communal_grave')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="bg-info p-1 text-center mb-1">Relaciones</h6>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <label for="r-relationship_equals">Igual a</label>
                        <input type="text" id="r-relationship_equals" class="form-control form-control-sm @error('relationship_equals') is-invalid @enderror"
                               wire:model="relationship_equals">
                        @error('relationship_equals')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="r-relationship_attached">Se le adosa</label>
                        <input type="text" id="r-relationship_attached" class="form-control form-control-sm @error('relationship_attached') is-invalid @enderror"
                               wire:model="relationship_attached">
                        @error('relationship_attached')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="r-relationship_covered_by">Cubierto por</label>
                        <input type="text" id="r-relationship_covered_by" class="form-control form-control-sm @error('relationship_covered_by') is-invalid @enderror"
                               wire:model="relationship_covered_by">
                        @error('relationship_covered_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="r-relationship_filling_by">Relleno por</label>
                        <input type="text" id="r-relationship_filling_by" class="form-control form-control-sm @error('relationship_filling_by') is-invalid @enderror"
                               wire:model="relationship_filling_by">
                        @error('relationship_filling_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="r-relationship_cut_by">Cortado por</label>
                        <input type="text" id="r-relationship_cut_by" class="form-control form-control-sm @error('relationship_cut_by') is-invalid @enderror"
                               wire:model="relationship_cut_by">
                        @error('relationship_cut_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="r-relationship_equivalent_to">Equivale a</label>
                        <input type="text" id="r-relationship_equivalent_to" class="form-control form-control-sm @error('relationship_equivalent_to') is-invalid @enderror"
                               wire:model="relationship_equivalent_to">
                        @error('relationship_equivalent_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="r-relationship_attached_to">Se adosa a</label>
                        <input type="text" id="r-relationship_attached_to" class="form-control form-control-sm @error('relationship_attached_to') is-invalid @enderror"
                               wire:model="relationship_attached_to">
                        @error('relationship_attached_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="r-relationship_covers_to">Cubre a</label>
                        <input type="text" id="r-relationship_covers_to" class="form-control form-control-sm @error('relationship_covers_to') is-invalid @enderror"
                               wire:model="relationship_covers_to">
                        @error('relationship_covers_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="r-relationship_fill_to">Rellena a</label>
                        <input type="text" id="r-relationship_fill_to" class="form-control form-control-sm @error('relationship_fill_to') is-invalid @enderror"
                               wire:model="relationship_fill_to">
                        @error('relationship_fill_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="r-relationship_cut_to">Corta a</label>
                        <input type="text" id="r-relationship_cut_to" class="form-control form-control-sm @error('relationship_cut_to') is-invalid @enderror"
                               wire:model="relationship_cut_to">
                        @error('relationship_cut_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>
                <hr class="bg-info">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="r-periodization">Periodización</label>
                        <input type="text" id="r-periodization" class="form-control form-control-sm @error('periodization') is-invalid @enderror"
                               wire:model="periodization">
                        @error('periodization')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="r-provisional_dating">Datación provisional</label>
                        <input type="date" id="r-provisional_dating" class="form-control form-control-sm @error('provisional_dating') is-invalid @enderror"
                               wire:model="provisional_dating">
                        @error('provisional_dating')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="r-interpretation">Interpretación</label>
                    <textarea rows="3" id="r-interpretation" class="form-control form-control-sm @error('interpretation') is-invalid @enderror"
                              wire:model="interpretation"></textarea>
                    @error('interpretation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="cfw_file_topographic">Archivo topográfico</label>
                        <input type="file" class="form-control form-control-sm @error('file_topographic') is-invalid @enderror"
                               wire:model="file_topographic" id="cfw_file_topographic"
                        />
                        @error('file_topographic')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="bg-info">
                        @if($humanRemainCard)
                            <div class="d-flex justify-content-center align-items-center">
                            @foreach($humanRemainCard->urlFileTopographicPublicAttribute() as $url => $pUrl)
                                <div class="position-relative d-inline-block">
{{--                                    <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
                                    @if(strcmp($pUrl['type'], 'image') == 0)
                                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                        <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @else
                                        <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @endif

                                    <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                            wire:click="removeTopographies()"
                                    >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cfw_file_photographic">Archivo fotográfico</label>
                        <input type="file" class="form-control form-control-sm @error('file_photographic') is-invalid @enderror"
                               wire:model="file_photographic" id="cfw_file_photographic"
                        />
                        @error('file_photographic')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="bg-info">
                        @if($humanRemainCard)
                            <div class="d-flex justify-content-center align-items-center">
                            @foreach($humanRemainCard->urlFilePhotographicPublicAttribute() as $url => $pUrl)
                                <div class="position-relative d-inline-block">
{{--                                    <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
                                    @if(strcmp($pUrl['type'], 'image') == 0)
                                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                        <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @else
                                        <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                            wire:click="removePhotographs()"
                                    >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="r-dates">Fechas</label>
                        <input type="text" id="r-dates" class="form-control form-control-sm @error('dates') is-invalid @enderror"
                               wire:model="dates">
                        @error('dates')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="r-author">Autor</label>
                        <input type="text" id="r-author" class="form-control form-control-sm @error('author') is-invalid @enderror"
                               wire:model="author">
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="cfw-sketch">Croquis inhumación (orientación y posición)</label>
                        <input type="file" class="form-control form-control-sm @error('sketch') is-invalid @enderror"
                               wire:model="sketch" id="cfw-sketch"
                        />
                        @error('sketch')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="bg-info">
                        @if($humanRemainCard)
                            <div class="d-flex justify-content-center align-items-center">
                            @foreach($humanRemainCard->urlSketchPublicAttribute() as $url => $pUrl)
                                <div class="position-relative d-inline-block">
{{--                                    <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
                                    @if(strcmp($pUrl['type'], 'image') == 0)
                                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                        <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @else
                                        <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @endif

                                    <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                        wire:click="removeSketch()"
                                    >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="cfw-preserved_part">Parte conservada</label>
                        <input type="file" class="form-control form-control-sm @error('preserved_part') is-invalid @enderror"
                               wire:model="preserved_part" id="cfw-preserved_part"
                        />
                        @error('preserved_part')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="bg-info">
                        @if($humanRemainCard)
                            <div class="d-flex justify-content-center align-items-center">
                            @foreach($humanRemainCard->urlPreservedPartPublicAttribute() as $url => $pUrl)
                                <div class="position-relative d-inline-block">
{{--                                    <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
                                    @if(strcmp($pUrl['type'], 'image') == 0)
                                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                        <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @else
                                        <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250 mb-1" />
                                        <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                        wire:click="removePreservedPart()"
                                    >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="hrc-description">Observaciones antropológicas</label>
                    <textarea class="form-control form-control-sm @error('description') is-invalid @enderror"
                              id="hrc-description" wire:model="description" rows="3" ></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Disposición</label>
                        <div>
                            <div class="form-check form-check-inline @error('disposition_decubito_supino') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-disposition_decubito_supino" value="1"
                                       wire:model="disposition_decubito_supino" @if($disposition_decubito_supino) checked @endif
                                >
                                <label class="form-check-label" for="c-disposition_decubito_supino">Decúbito supino</label>
                            </div>
                            @error('disposition_decubito_supino')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check form-check-inline @error('disposition_decubito_lateral_der') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-disposition_decubito_lateral_der" value="1"
                                       wire:model="disposition_decubito_lateral_der" @if($disposition_decubito_lateral_der) checked @endif
                                >
                                <label class="form-check-label" for="c-disposition_decubito_lateral_der">Decúbito lateral derecho</label>
                            </div>
                            @error('disposition_decubito_lateral_der')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check form-check-inline @error('disposition_decubito_lateral_izq') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-disposition_decubito_lateral_izq" value="1"
                                       wire:model="disposition_decubito_lateral_izq" @if($disposition_decubito_lateral_izq) checked @endif
                                >
                                <label class="form-check-label" for="c-disposition_decubito_lateral_izq">Decúbito lateral izquierdo</label>
                            </div>
                            @error('disposition_decubito_lateral_izq')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Deposito</label>
                        <div>
                            <div class="form-check form-check-inline @error('deposito_adorno_per') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-deposito_adorno_per" value="1"
                                       wire:model="deposito_adorno_per" @if($deposito_adorno_per) checked @endif
                                >
                                <label class="form-check-label" for="c-deposito_adorno_per">Adorno personal</label>
                            </div>
                            @error('deposito_adorno_per')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check form-check-inline @error('deposito_ceramica') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-deposito_ceramica" value="1"
                                       wire:model="deposito_ceramica" @if($deposito_ceramica) checked @endif
                                >
                                <label class="form-check-label" for="c-deposito_ceramica">Cerámica</label>
                            </div>
                            @error('deposito_ceramica')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check form-check-inline @error('deposito_armamento') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-deposito_armamento" value="1"
                                       wire:model="deposito_armamento" @if($deposito_armamento) checked @endif
                                >
                                <label class="form-check-label" for="c-deposito_armamento">Armamento</label>
                            </div>
                            @error('deposito_armamento')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check form-check-inline @error('deposito_fauna') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-deposito_fauna" value="1"
                                       wire:model="deposito_fauna" @if($deposito_fauna) checked @endif
                                >
                                <label class="form-check-label" for="c-deposito_fauna">Fauna</label>
                            </div>
                            @error('deposito_fauna')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-check form-check-inline @error('deposito_semillas') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" id="c-deposito_semillas" value="1"
                                       wire:model="deposito_semillas" @if($deposito_semillas) checked @endif
                                >
                                <label class="form-check-label" for="c-deposito_semillas">Semillas</label>
                            </div>
                            @error('deposito_semillas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                <input class="" type="checkbox" value="1"
                                       wire:model="brazos_ext_largo_cuerpo_izq" @if($brazos_ext_largo_cuerpo_izq) checked @endif
                                />
                            </div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="brazos_ext_largo_cuerpo_der" @if($brazos_ext_largo_cuerpo_der) checked @endif
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">Sobre pelvis</div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="brazos_sobre_pelvis_izq" @if($brazos_sobre_pelvis_izq) checked @endif
                                />
                            </div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="brazos_sobre_pelvis_der" @if($brazos_sobre_pelvis_der) checked @endif
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">Sobre el pecho</div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="brazos_sobre_pecho_izq" @if($brazos_sobre_pecho_izq) checked @endif
                                />
                            </div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="brazos_sobre_pecho_der" @if($brazos_sobre_pecho_der) checked @endif
                                />
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
                                <input class="" type="checkbox" value="1"
                                       wire:model="piernas_ext_izq" @if($piernas_ext_izq) checked @endif
                                />
                            </div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="piernas_ext_der" @if($piernas_ext_der) checked @endif
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">Semi-flexionada</div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="piernas_semi_flex_izq" @if($piernas_semi_flex_izq) checked @endif
                                />
                            </div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="piernas_semi_flex_der" @if($piernas_semi_flex_der) checked @endif
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">Flexionada</div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="piernas_flexionada_izq" @if($piernas_flexionada_izq) checked @endif
                                />
                            </div>
                            <div class="col-md-2 text-center">
                                <input class="" type="checkbox" value="1"
                                       wire:model="piernas_flexionada_der" @if($piernas_flexionada_der) checked @endif
                                />
                            </div>
                        </div>
                    </div>
                </div>




                <hr>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="hrc-obs_antropologicas">Observaciones antropológicas</label>
                        <textarea class="form-control form-control-sm @error('obs_antropologicas') is-invalid @enderror"
                                  id="hrc-obs_antropologicas" wire:model="obs_antropologicas" rows="3" ></textarea>
                        @error('obs_antropologicas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="hrc-specify">Especificar</label>
                        <textarea class="form-control form-control-sm @error('specify') is-invalid @enderror"
                                  id="hrc-specify" wire:model="specify" rows="3" ></textarea>
                        @error('specify')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="hrc-observations">OBSERVACIONES</label>
                    <textarea class="form-control form-control-sm @error('observations') is-invalid @enderror"
                              id="hrc-observations" wire:model="observations" rows="3" ></textarea>
                    @error('observations')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('close-human-remain-card-update')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Grabar</button>
            </div>
        </div>
    </form>
</div>
