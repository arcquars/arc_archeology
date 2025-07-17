<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="updateStructureTab">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Actualizar ficha de estructura</div>
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
                <div class="form-group">
                    <label>Conservación</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="conservation" id="c-muy_deficiente" value="MUY DEFICIENTE"
                                   wire:model="conservation"
                            >
                            <label class="form-check-label" for="c-muy_deficiente">Muy deficiente</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="conservation" id="c-deficiente" value="DEFICIENTE"
                                   wire:model="conservation"
                            >
                            <label class="form-check-label" for="c-deficiente">Deficiente</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="conservation" id="c-aceptable" value="ACEPTABLE"
                                   wire:model="conservation"
                            >
                            <label class="form-check-label" for="c-aceptable">Aceptable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="conservation" id="c-satisfactoria" value="SATISFACTORIA"
                                   wire:model="conservation"
                            >
                            <label class="form-check-label" for="c-satisfactoria">Satisfactoria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="conservation" id="c-retirar" value="RETIRAR"
                                   wire:model="conservation"
                            >
                            <label class="form-check-label" for="c-retirar">Retirar</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="conservation" id="c-conservar" value="CONSERVAR"
                                   wire:model="conservation"
                            >
                            <label class="form-check-label" for="c-conservar">Conservar</label>
                        </div>
                    </div>
                </div>
                <h5 class="bg-info p-1 text-center">Descripción e interpretación</h5>
                <div class="row">
                    <div class="col-md-6">
                        <label for="i-descripcion">Descripción</label>
                        <textarea id="i-descripcion" rows="3" class="form-control form-control-sm @error('interpretation_description') is-invalid @enderror" wire:model="interpretation_description"></textarea>
                        @error('interpretation_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="cfw_photo">interpretación</label>
                        <input type="file" class="form-control form-control-sm @error('photo') is-invalid @enderror"
                               wire:model="photo" id="cfw_photo"
                        />
                        @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="bg-info">
                        @foreach($structureTab->urlPhotoPublicAttribute() as $i => $url)
                            <div class="position-relative d-inline-block">
                                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />

                                <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                        wire:click="removePhoto('{{$i}}')"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="i-aparejo">Aparejo</label>
                        <input type="text" id="i-aparejo" wire:model="aparejo" class="form-control form-control-sm @error('aparejo') is-invalid @enderror">
                        @error('aparejo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="i-largo">Largo</label>
                        <input type="text" id="i-largo" wire:model="largo" class="form-control form-control-sm @error('largo') is-invalid @enderror">
                        @error('largo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="i-anchura">Anchura</label>
                        <input type="text" id="i-anchura" wire:model="anchura" class="form-control form-control-sm @error('anchura') is-invalid @enderror">
                        @error('anchura')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="i-alto_grueso">Alto-Grueso</label>
                        <input type="text" id="i-alto_grueso" wire:model="alto_grueso" class="form-control form-control-sm @error('alto_grueso') is-invalid @enderror">
                        @error('alto_grueso')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="bg-info p-1 text-center mb-1">Orientación en °</h5>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="i-orientacion_1">1 grado</label>
                                <input type="text" id="i-orientacion_1" wire:model="orientacion_1" class="form-control form-control-sm @error('orientacion_1') is-invalid @enderror">
                                @error('orientacion_1')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="i-orientacion_2">2 grado</label>
                                <input type="text" id="i-orientacion_2" wire:model="orientacion_2" class="form-control form-control-sm @error('orientacion_2') is-invalid @enderror">
                                @error('orientacion_2')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="bg-info p-1 text-uppercase text-center">Estratigrafía</h6>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="e-equals">Igual a</label>
                        <input type="text" id="e-equals" class="form-control form-control-sm @error('stratigraphy_equals') is-invalid @enderror" wire:model="stratigraphy_equals">
                        @error('stratigraphy_equals')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="e-support_provided">Se le apoya</label>
                        <input type="text" id="e-support_provided" class="form-control form-control-sm @error('stratigraphy_support_provided') is-invalid @enderror" wire:model="stratigraphy_support_provided">
                        @error('stratigraphy_support_provided')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="e-covered_by">Cubierto por</label>
                        <input type="text" id="e-covered_by" class="form-control form-control-sm @error('stratigraphy_covered_by') is-invalid @enderror" wire:model="stratigraphy_covered_by">
                        @error('stratigraphy_covered_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="e-filling_by">Relleno por</label>
                        <input type="text" id="e-filling_by" class="form-control form-control-sm @error('stratigraphy_filling_by') is-invalid @enderror" wire:model="stratigraphy_filling_by">
                        @error('stratigraphy_filling_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="e-cut_by">Cortado por</label>
                        <input type="text" id="e-cut_by" class="form-control form-control-sm @error('stratigraphy_cut_by') is-invalid @enderror" wire:model="stratigraphy_cut_by">
                        @error('stratigraphy_cut_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="e-equivale">Equivale</label>
                        <input type="text" id="e-equivale" class="form-control form-control-sm @error('stratigraphy_equivale') is-invalid @enderror" wire:model="stratigraphy_equivale">
                        @error('stratigraphy_equivale')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="e-supported_by">Se apoya en</label>
                        <input type="text" id="e-supported_by" class="form-control form-control-sm @error('stratigraphy_supported_by') is-invalid @enderror" wire:model="stratigraphy_supported_by">
                        @error('stratigraphy_supported_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="e-overlaps_or_covers">Cubre o se superpone a</label>
                        <input type="text" id="e-overlaps_or_covers" class="form-control form-control-sm @error('stratigraphy_overlaps_or_covers') is-invalid @enderror" wire:model="stratigraphy_overlaps_or_covers">
                        @error('stratigraphy_overlaps_or_covers')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="e-fill_in">Rellena a</label>
                        <input type="text" id="e-fill_in" class="form-control form-control-sm @error('stratigraphy_fill_in') is-invalid @enderror" wire:model="stratigraphy_fill_in">
                        @error('stratigraphy_fill_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="e-cut_to">Corta a</label>
                        <input type="text" id="e-cut_to" class="form-control form-control-sm @error('stratigraphy_cut_to') is-invalid @enderror" wire:model="stratigraphy_cut_to">
                        @error('stratigraphy_cut_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                    </div>
                    <div class="col-md-3 form-group">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="cfw_sketch">Croquis</label>
                        <input type="file" class="form-control form-control-sm @error('sketch') is-invalid @enderror"
                               wire:model="sketch" id="cfw_sketch"
                        />
                        @error('sketch')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="bg-info">
                        @foreach($structureTab->urlSketchPublicAttribute() as $url)
                            <div class="position-relative d-inline-block">
                                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />

                                <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                        wire:click="removeSketch()"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h6 class="bg-info p-1 text-center mb-1">Cotas</h6>
                        <h5>
                            {{-- Botón para añadir Cota --}}
                            <button wire:click="addQuote(null, null, null)" class="btn btn-outline-info btn-sm" type="button"
                                    @if (count($quotes) >= $maxQuotes) disabled @endif>
                                Añadir Cota ({{ count($quotes) }} / {{ $maxQuotes }})
                            </button>
                        </h5>
                        <div class="row">
                            @foreach($quotes as $index => $quote)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Cota #{{ $index + 1 }}</span>
                                                <button type="button" wire:click="removeQuote({{ $index }})" class="btn btn-danger btn-sm">
                                                    Eliminar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-2">
                                                <label for="surface-{{ $index }}">Superficie:</label>
                                                <input type="number" id="surface-{{ $index }}" step="0.01"
                                                       wire:model="quotes.{{ $index }}.surface"
                                                       class="form-control @error('quotes.' . $index . '.surface') is-invalid @enderror"
                                                       placeholder="Ej: 100.50">
                                                @error('quotes.'.$index.'.surface')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="information-{{ $index }}">Inf:</label>
                                                <input type="number" id="information-{{ $index }}" step="0.01"
                                                       wire:model="quotes.{{ $index }}.information"
                                                       rows="3"
                                                       class="form-control @error('quotes.' . $index . '.information') is-invalid @enderror"
                                                       placeholder="Ej: 100.50" />
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

{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <h6 class="bg-info p-1 text-center mb-1">Cotas</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <h5>--}}
{{--                     Botón para añadir Cota --}}
{{--                    <button wire:click="addQuote(null, '', '')" class="btn btn-outline-info btn-sm" type="button"--}}
{{--                            @if (count($quotes) >= $maxQuotes) disabled @endif>--}}
{{--                        Añadir Cota ({{ count($quotes) }} / {{ $maxQuotes }})--}}
{{--                    </button>--}}
{{--                </h5>--}}
{{--                <div class="row">--}}
{{--                    @foreach($quotes as $index => $quote)--}}
{{--                        <div class="col-md-3">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                        <span>Cota #{{ $index + 1 }}</span>--}}
{{--                                        <button type="button" wire:click="removeQuote({{ $index }})" class="btn btn-danger btn-sm">--}}
{{--                                            Eliminar--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="form-group mb-2">--}}
{{--                                        <label for="surface-{{ $index }}">Superficie:</label>--}}
{{--                                        <input type="number" id="surface-{{ $index }}" step="0.01"--}}
{{--                                               wire:model="quotes.{{ $index }}.surface"--}}
{{--                                               class="form-control @error('quotes.' . $index . '.surface') is-invalid @enderror"--}}
{{--                                               placeholder="Ej: 100.50">--}}
{{--                                        @error('quotes.'.$index.'.surface')--}}
{{--                                        <span class="invalid-feedback">{{ $message }}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-2">--}}
{{--                                        <label for="information-{{ $index }}">Información:</label>--}}
{{--                                        <input type="number" id="information-{{ $index }}" step="0.01"--}}
{{--                                               wire:model="quotes.{{ $index }}.information"--}}
{{--                                               rows="3"--}}
{{--                                               class="form-control @error('quotes.' . $index . '.information') is-invalid @enderror"--}}
{{--                                               placeholder="Detalles adicionales sobre la cota" />--}}
{{--                                        @error('quotes.'. $index .'.information')--}}
{{--                                        <span class="invalid-feedback">{{ $message }}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="bg-info p-1 text-center mb-1">DIMENSIONES EN CM DE LOS LADRILLOS (DE PARED O PAVIMENTO), TOMAR COMO MÍNIMO 25 EJEMPLOS DE PIEZAS COMPLETAS (si es posible).</h6>
                    </div>
                </div>
                <h5>
                    {{-- Botón para añadir dimension de ladrillos --}}
                    <button wire:click="addBrick(null, '', '', '')" class="btn btn-outline-info btn-sm" type="button"
                            @if (count($bricks) >= $maxBricks) disabled @endif>
                        Añadir dimension ladrillo ({{ count($bricks) }} / {{ $maxBricks }})
                    </button>
                </h5>
                <div class="row">
                    @foreach($bricks as $index => $brick)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Ladrillo #{{ $index + 1 }}</span>
                                        <button type="button" wire:click="removeBrick({{ $index }})" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="long-{{ $index }}">Largo:</label>
                                        <input type="number" id="long-{{ $index }}"
                                               wire:model="bricks.{{ $index }}.long"
                                               class="form-control @error('bricks.' . $index . '.long') is-invalid @enderror"
                                               placeholder="Ej: 100.50">
                                        @error('bricks.' . $index . '.long')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="width-{{ $index }}">Ancho:</label>
                                        <input type="number" id="width-{{ $index }}"
                                               wire:model="bricks.{{ $index }}.width"
                                               class="form-control @error('bricks.' . $index . '.width') is-invalid @enderror"
                                               placeholder="Ej: 100.50">
                                        @error('bricks.' . $index . '.width')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="thick-{{ $index }}">Grueso:</label>
                                        <input type="number" id="thick-{{ $index }}"
                                               wire:model="bricks.{{ $index }}.thick"
                                               class="form-control @error('bricks.' . $index . '.thick') is-invalid @enderror"
                                               placeholder="Ej: 100.50">
                                        @error('bricks.' . $index . '.thick')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="bg-info p-1 text-center mb-1">Altura de las tapias</h6>
                    </div>
                </div>
                <h5>
                    {{-- Botón para añadir altura de las tapias --}}
                    <button wire:click="addFormwork(null, '')" class="btn btn-outline-info btn-sm" type="button"
                            @if (count($formworks) >= $maxFormworks) disabled @endif>
                        Añadir Estructura encofrada ({{ count($formworks) }} / {{ $maxFormworks }})
                    </button>
                </h5>
                <div class="row">
                    @foreach($formworks as $index => $formwork)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>Encofrado #{{ $index + 1 }}</span>
                                        <button type="button" wire:click="removeFormwork({{ $index }})" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="formwork-{{ $index }}">Encofrado:</label>
                                        <input type="number" id="formwork-{{ $index }}"
                                               wire:model="formworks.{{ $index }}.formwork"
                                               class="form-control @error('formworks.' . $index . '.formwork') is-invalid @enderror"
                                               placeholder="Ej: 100.50">
                                        @error('formworks.' . $index . '.formwork')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>




            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('close-structure-tab-update')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Grabar</button>
            </div>
        </div>
    </form>
</div>
