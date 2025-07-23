<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="updateStratumCard">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Actualizar ficha de estrato</div>
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
                               wire:model="i_n_ue" id="sc-i_n_ue" disabled
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
                    <div class="col-md-3 form-group">
                        <label for="sc-i_provisional_dating">Datación provisional</label>
                        <input type="text" class="form-control form-control-sm @error('i_provisional_dating') is-invalid @enderror"
                               wire:model="i_provisional_dating" id="sc-i_provisional_dating"
                        >
                        @error('i_provisional_dating')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sc-i_stratigraphic_reliability">Fiabilidad estratigráfica</label>
                        <input type="text" class="form-control form-control-sm @error('i_stratigraphic_reliability') is-invalid @enderror"
                               wire:model="i_stratigraphic_reliability" id="sc-i_stratigraphic_reliability"
                        >
                        @error('i_stratigraphic_reliability')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="sc-i_type">Tipo</label>
                        <input type="text" class="form-control form-control-sm @error('i_type') is-invalid @enderror"
                               wire:model="i_type" id="sc-i_type"
                        >
                        @error('i_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Conservación</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="preservation" id="c-muy_deficiente" value="MUY DEFICIENTE"
                                           wire:model="preservation"
                                    >
                                    <label class="form-check-label" for="c-muy_deficiente">Muy deficiente</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="preservation" id="c-deficiente" value="DEFICIENTE"
                                           wire:model="preservation"
                                    >
                                    <label class="form-check-label" for="c-deficiente">Deficiente</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="preservation" id="c-aceptable" value="ACEPTABLE"
                                           wire:model="preservation"
                                    >
                                    <label class="form-check-label" for="c-aceptable">Aceptable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="preservation" id="c-satisfactoria" value="SATISFACTORIA"
                                           wire:model="preservation"
                                    >
                                    <label class="form-check-label" for="c-satisfactoria">Satisfactoria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="preservation" id="c-retirar" value="RETIRAR"
                                           wire:model="preservation"
                                    >
                                    <label class="form-check-label" for="c-retirar">Retirar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="preservation" id="c-conservar" value="CONSERVAR"
                                           wire:model="preservation"
                                    >
                                    <label class="form-check-label" for="c-conservar">Conservar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Interpretación</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="interpretation" id="i-natural" value="Gravas (2 mm-1 cm) %"
                                           wire:model="interpretation"
                                    >
                                    <label class="form-check-label" for="i-natural">Natural</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="interpretation" id="i-construccion" value="Construcción"
                                           wire:model="interpretation"
                                    >
                                    <label class="form-check-label" for="i-construccion">Construcción</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="interpretation" id="i-ocupacion" value="Ocupación"
                                           wire:model="interpretation"
                                    >
                                    <label class="form-check-label" for="i-ocupacion">Ocupación</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="interpretation" id="i-destruccion" value="Destrucción"
                                           wire:model="interpretation"
                                    >
                                    <label class="form-check-label" for="i-destruccion">Destrucción</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fracción fina</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fine_fraction" id="ff-arena" value="Arena"
                                           wire:model="fine_fraction"
                                    >
                                    <label class="form-check-label" for="ff-arena">Arena</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fine_fraction" id="ff-arcilla" value="Arcilla"
                                           wire:model="fine_fraction"
                                    >
                                    <label class="form-check-label" for="ff-arcilla">Arcilla</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fine_fraction" id="ff-arcilla-arenosa" value="Arcilla-Arenosa"
                                           wire:model="fine_fraction"
                                    >
                                    <label class="form-check-label" for="ff-arcilla-arenosa">Arcilla-Arenosa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fine_fraction" id="ff-limo-arenoso" value="Limo-Arenoso"
                                           wire:model="fine_fraction"
                                    >
                                    <label class="form-check-label" for="ff-limo-arenoso">Limo-Arenoso</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fine_fraction" id="ff-limo-arcilloso" value="Limo-Arcilloso"
                                           wire:model="fine_fraction"
                                    >
                                    <label class="form-check-label" for="ff-limo-arcilloso">Limo-Arcilloso</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fine_fraction" id="ff-limo" value="Limo"
                                           wire:model="fine_fraction"
                                    >
                                    <label class="form-check-label" for="ff-limo">Limo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fine_fraction" id="ff-arcilla-limosa" value="Arcilla-Limosa"
                                           wire:model="fine_fraction"
                                    >
                                    <label class="form-check-label" for="ff-arcilla-limosa">Arcilla-Limosa</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fracción gruesa</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="coarse_fraction" id="fg-gravas" value="Gravas (2 mm-1 cm) %"
                                           wire:model="coarse_fraction"
                                    >
                                    <label class="form-check-label" for="fg-gravas">Gravas (2 mm-1 cm) %</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="coarse_fraction" id="fg-cantos" value="Cantos (1-10 cm) %"
                                           wire:model="coarse_fraction"
                                    >
                                    <label class="form-check-label" for="fg-cantos">Cantos (1-10 cm) %</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="coarse_fraction" id="fg-bloques" value="Bloques (>10 cm) %"
                                           wire:model="coarse_fraction"
                                    >
                                    <label class="form-check-label" for="fg-bloques">Bloques (>10 cm) %</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="i-descripcion">Descripción</label>
                    <textarea id="i-descripcion" rows="3" class="form-control" wire:model="interpretation_description"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="bg-info p-1 text-center">COMPOSICIÓN</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">ORGÁNICA</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="organic_composition" id="co_ceniza" value="Ceniza"
                                       wire:model="organic_composition"
                                >
                                <label class="form-check-label" for="co_ceniza">Ceniza</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="organic_composition" id="co_carbones" value="Carbones"
                                       wire:model="organic_composition"
                                >
                                <label class="form-check-label" for="co_carbones">Carbones</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="organic_composition" id="co_hueso" value="Hueso"
                                       wire:model="organic_composition"
                                >
                                <label class="form-check-label" for="co_hueso">Hueso</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="organic_composition" id="co_malacof" value="Malacof"
                                       wire:model="organic_composition"
                                >
                                <label class="form-check-label" for="co_malacof">Malacof</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="organic_composition" id="co_madera" value="Madera"
                                       wire:model="organic_composition"
                                >
                                <label class="form-check-label" for="co_madera">Madera</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">INORGÁNICA</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-ladrillo" value="Ladrillo"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-ladrillo">Ladrillo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-escoria" value="Escoria"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-escoria">Escoria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-enlucido" value="Enlucido"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-enlucido">Enlucido</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-mortero" value="Mortero"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-mortero">Mortero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-cal" value="Cal"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-cal">Cal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-piedra_trabajada" value="Piedra trabajada"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-piedra_trabajada">Piedra trabajada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-tejas" value="Tejas"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-tejas">Tejas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-adobes" value="Adobes"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-adobes">Adobes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inorganic_composition" id="ci-plastico" value="Plástico"
                                       wire:model="inorganic_composition"
                                >
                                <label class="form-check-label" for="ci-plastico">Plástico</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h5 class="bg-info p-1 text-center">ESTRATIGRAFÍA</h5>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <label for="e-equals">Igual a</label>
                        <input type="text" id="e-equals" class="form-control form-control-sm @error('stratigraphy_equals') is-invalid @enderror" wire:model="stratigraphy_equals">
                        @error('stratigraphy_equals')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="e-support_provided">Se le apoya</label>
                        <input type="text" id="e-support_provided" class="form-control form-control-sm @error('stratigraphy_support_provided') is-invalid @enderror" wire:model="stratigraphy_support_provided">
                        @error('stratigraphy_support_provided')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="e-covered_by">Cubierto por</label>
                        <input type="text" id="e-covered_by" class="form-control form-control-sm @error('stratigraphy_covered_by') is-invalid @enderror" wire:model="stratigraphy_covered_by">
                        @error('stratigraphy_covered_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="e-filling_by">Relleno por</label>
                        <input type="text" id="e-filling_by" class="form-control form-control-sm @error('stratigraphy_filling_by') is-invalid @enderror" wire:model="stratigraphy_filling_by">
                        @error('stratigraphy_filling_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="e-cut_by">Cortado por</label>
                        <input type="text" id="e-cut_by" class="form-control form-control-sm @error('stratigraphy_cut_by') is-invalid @enderror" wire:model="stratigraphy_cut_by">
                        @error('stratigraphy_cut_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="e-equivale">Equivale</label>
                        <input type="text" id="e-equivale" class="form-control form-control-sm @error('stratigraphy_equivale') is-invalid @enderror" wire:model="stratigraphy_equivale">
                        @error('stratigraphy_equivale')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="e-supported_by">Se apoya en</label>
                        <input type="text" id="e-supported_by" class="form-control form-control-sm @error('stratigraphy_supported_by') is-invalid @enderror" wire:model="stratigraphy_supported_by">
                        @error('stratigraphy_supported_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="e-overlaps_or_covers">Cubre o se superpone a</label>
                        <input type="text" id="e-overlaps_or_covers" class="form-control form-control-sm @error('stratigraphy_overlaps_or_covers') is-invalid @enderror" wire:model="stratigraphy_overlaps_or_covers">
                        @error('stratigraphy_overlaps_or_covers')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="e-fill_in">Rellena a</label>
                        <input type="text" id="e-fill_in" class="form-control form-control-sm @error('stratigraphy_fill_in') is-invalid @enderror" wire:model="stratigraphy_fill_in">
                        @error('stratigraphy_fill_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="e-cut_to">Corta a</label>
                        <input type="text" id="e-cut_to" class="form-control form-control-sm @error('stratigraphy_cut_to') is-invalid @enderror" wire:model="stratigraphy_cut_to">
                        @error('stratigraphy_cut_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cfw_sketch">Croquis</label>
                            <input type="file" class="form-control form-control-sm @error('sketch') is-invalid @enderror"
                                   wire:model="sketch" id="cfw_sketch"
                            />
                            @error('sketch')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr class="bg-info">
                        @foreach($stratumCard->urlCroquisPublicAttribute() as $url => $pUrl)
                            <div class="position-relative d-inline-block">
{{--                                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
                                @if(strcmp($pUrl['type'], 'image') == 0)
                                    <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />
                                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                    <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @else
                                    <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @endif

                                <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;" wire:click="removeSketch()">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-info p-1 text-center mb-1">Cotas</h6>
                        <hr class="bg-info m-1">
                        <button wire:click="addQuote(null, '', '')" class="btn btn-outline-info btn-sm" type="button"
                                @if (count($quotes) >= $maxQuotes) disabled @endif>
                            Añadir Cota ({{ count($quotes) }} / {{ $maxQuotes }})
                        </button>
                        <div class="row">
                            @foreach($quotes as $index => $quote)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Cota #{{ $index + 1 }}</span>
                                                <button type="button" wire:click="removeQuote({{ $index }})" class="btn btn-danger btn-sm">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-2">
                                                <label for="surface-{{ $index }}">Superficie:</label>
                                                <input type="number" id="surface-{{ $index }}"
                                                       wire:model="quotes.{{ $index }}.surface"
                                                       class="form-control form-control-sm @error('quotes.' . $index . '.surface') is-invalid @enderror"
                                                       placeholder="Ej: 100.50">
                                                @error('quotes.'.$index.'.surface')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="information-{{ $index }}">Información:</label>
                                                <input id="information-{{ $index }}"
                                                       wire:model="quotes.{{ $index }}.information"
                                                       rows="3"
                                                       class="form-control form-control-sm @error('quotes.' . $index . '.information') is-invalid @enderror"
                                                       placeholder="Detalles adicionales sobre la cota" />
                                                @error('quotes.'. $index .'.information')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <hr class="bg-info">
                <div class="form-group">
                    <label for="comment">Comentario</label>
                    <textarea id="comment" rows="3" class="form-control" wire:model="comment"></textarea>
                </div>
                <div class="form-group">
                    <label>Volumen de material</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="vm-nada" value="Nada"
                                   wire:model="volume_material"
                            >
                            <label class="form-check-label" for="vm-nada">Nada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="vm-muy_escaso" value="Muy escaso (menos de una bolsa pequeña)"
                                   wire:model="volume_material"
                            >
                            <label class="form-check-label" for="vm-muy_escaso">Muy escaso (menos de una bolsa pequeña)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="vm-muy_escaso_p" value="Muy escaso (una bolsa pequeña)"
                                   wire:model="volume_material"
                            >
                            <label class="form-check-label" for="vm-muy_escaso_p">Muy escaso (una bolsa pequeña)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="vm-normal" value="Normal (una bolsa grande)"
                                   wire:model="volume_material"
                            >
                            <label class="form-check-label" for="vm-normal">Normal (una bolsa grande)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="vm-abundante" value="Abundante"
                                   wire:model="volume_material"
                            >
                            <label class="form-check-label" for="vm-abundante">Abundante</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="vm-muy_abundante" value="Muy abundante (una o más cajas de plástico)"
                                   wire:model="volume_material"
                            >
                            <label class="form-check-label" for="vm-muy_abundante">Muy abundante (una o más cajas de plástico)</label>
                        </div>
                    </div>
                </div>
                @include('livewire.projects.stratum-tab.partials._stratum-form-materials')
                @include('livewire.projects.stratum-tab.partials._stratum-form-recovered')
                @include('livewire.projects.stratum-tab.partials._stratum-form-stratum')

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea id="" rows="3" class="form-control form-control-sm" wire:model="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="cfw_photos">Fotografias</label>
                    <input type="file" class="form-control form-control-sm @error('photos.*') is-invalid @enderror"
                           wire:model="photos" id="cfw_photos" multiple
                    />
                    @error('photos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @error('photos.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="bg-info">
                <div class="row">
                    @foreach($stratumCard->urlPhotosPublicAttribute() as $url => $pUrl)
                        <div class="col-md-3">
                            <div class="position-relative d-inline-block">
{{--                                <img src="{{ $pUrl }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
                                @if(strcmp($pUrl['type'], 'image') == 0)
                                    <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />
                                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                    <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @else
                                    <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                    <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                                @endif
                                <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                        wire:click="removePhoto('{{$index}}')"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('close-stratum-card-update')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Grabar</button>
            </div>
        </div>
    </form>
</div>
