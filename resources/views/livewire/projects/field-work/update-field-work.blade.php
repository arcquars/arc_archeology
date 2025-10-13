<div>
    <div class="card border border-info mb-2 mt-2">
        <form wire:submit.prevent="updateFieldWork" enctype="multipart/form-data">
            <div class="card-header p-2 text-info">Editar Ficha Estratigrafia mural</div>
            <div class="card-body text-secondary p-2">
                <h6 class="bg-info p-1">IDENTIFICACION</h6>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="cfw_msc_date">Fecha</label>
                        <input type="date" class="form-control form-control-sm @error('msc_date') is-invalid @enderror"
                               wire:model="msc_date" id="cfw_msc_date"
                        >
                        @error('msc_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_floor">Planta</label>
                        <input type="text" class="form-control form-control-sm @error('floor') is-invalid @enderror"
                               wire:model="floor" id="cfw_floor"
                        >
                        @error('floor')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stay">Estancia</label>
                        <input type="text" class="form-control form-control-sm @error('stay') is-invalid @enderror"
                               wire:model="stay" id="cfw_stay"
                        >
                        @error('stay')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_quadrant">Cuadrante/Pared</label>
                        <input type="text" class="form-control form-control-sm @error('quadrant') is-invalid @enderror"
                               wire:model="quadrant" id="cfw_quadrant"
                        >
                        @error('quadrant')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="cfw_acronym">Acrónimo</label>
                        <input type="text" class="form-control form-control-sm @error('acronym') is-invalid @enderror"
                               wire:model="acronym" id="cfw_acronym"
                        >
                        @error('acronym')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_fact">Sector</label>
                        <input type="text" class="form-control form-control-sm @error('fact') is-invalid @enderror"
                               wire:model="fact" id="cfw_fact"
                        >
                        @error('fact')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_n_ue">N° UE</label>
                        <input type="text" class="form-control form-control-sm @error('n_ue') is-invalid @enderror"
                               wire:model="n_ue" id="cfw_n_ue" disabled
                        >
                        @error('n_ue')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_provisional_dating">Datacion provisional</label>
                        <input type="date" class="form-control form-control-sm @error('provisional_dating') is-invalid @enderror"
                               wire:model="provisional_dating" id="cfw_provisional_dating"
                        >
                        @error('provisional_dating')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphic_reliability">Fiabilidad estratigráfica</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphic_reliability') is-invalid @enderror"
                               wire:model="stratigraphic_reliability" id="cfw_stratigraphic_reliability"
                        >
                        @error('stratigraphic_reliability')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_identification_type">Tipo</label>
                        <input type="text" class="form-control form-control-sm @error('identification_type') is-invalid @enderror"
                               wire:model="identification_type" id="cfw_identification_type"
                        >
                        @error('identification_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <h6 class="bg-info p-1 text-uppercase">Conservación</h6>
                    <div class="form-check form-check-inline @error('preservation') is-invalid @enderror">
                        <input class="form-check-input" type="radio" value="MUY DEFICIENTE" name="preservation"
                               wire:model="preservation" id="cfw_muy_deficiente"
                        >
                        <label class="form-check-label" for="cfw_muy_deficiente">Muy deficiente</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="DEFICIENTE" name="preservation"
                               wire:model="preservation" id="cfw_deficiente"
                        >
                        <label class="form-check-label" for="cfw_deficiente">Deficiente</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="ACEPTABLE" name="preservation"
                               wire:model="preservation" id="cfw_aceptable"
                        >
                        <label class="form-check-label" for="cfw_aceptable">Aceptable</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="SATISFACTORIA" name="preservation"
                               wire:model="preservation" id="cfw_satisfactoria"
                        >
                        <label class="form-check-label" for="cfw_satisfactoria">Satisfactoria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="RETIRAR" name="preservation"
                               wire:model="preservation" id="cfw_retirar"
                        >
                        <label class="form-check-label" for="cfw_retirar">Retirar</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="CONSERVAR" name="preservation"
                               wire:model="preservation" id="cfw_conservar"
                        >
                        <label class="form-check-label" for="cfw_conservar">Conservar</label>
                    </div>
                    @error('preservation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <h6 class="bg-info p-1 text-uppercase">Descripción e interpretación</h6>
                <div class="form-group">
                <textarea name="" id="cfw_description" rows="3" class="form-control form-control-sm @error('description') is-invalid @enderror"
                          wire:model="description" id="cfw_description"
                ></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <h6 class="bg-info p-1 text-uppercase">Componentes</h6>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="border-bottom border-dark">Piedra</h6>
                        <div class="row">
                            <div class="col md-4 form-group">
                                <label for="cfw_component_stone_type">Tipo</label>
                                <input type="text" class="form-control form-control-sm @error('component_stone_type') is-invalid @enderror"
                                       wire:model="component_stone_type" id="cfw_component_stone_type"
                                />
                                @error('component_stone_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col md-4 form-group">
                                <label for="cfw_component_stone_characteristics">Caracteristicas</label>
                                <input type="text" class="form-control form-control-sm @error('component_stone_characteristics') is-invalid @enderror"
                                       wire:model="component_stone_characteristics" id="cfw_component_stone_characteristics"
                                />
                                @error('component_stone_characteristics')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col md-4 form-group">
                                <label for="cfw_component_stone_size">Talla/Trabajo</label>
                                <input type="text" class="form-control form-control-sm @error('component_stone_size') is-invalid @enderror"
                                       wire:model="component_stone_size" id="cfw_component_stone_size"
                                />
                                @error('component_stone_size')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="border-bottom border-dark">Ladrillo</h6>
                        <div class="row">
                            <div class="col md-4 form-group">
                                <label for="cfw_component_brick_type">Tipo</label>
                                <input type="text" class="form-control form-control-sm @error('component_brick_type') is-invalid @enderror"
                                       wire:model="component_brick_type" id="cfw_component_brick_type"
                                />
                                @error('component_brick_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col md-4 form-group">
                                <label for="cfw_component_brick_characteristics">Caracteristicas</label>
                                <input type="text" class="form-control form-control-sm @error('component_brick_characteristics') is-invalid @enderror"
                                       wire:model="component_brick_characteristics" id="cfw_component_brick_characteristics"
                                />
                                @error('component_brick_characteristics')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col md-4 form-group">
                                <label for="cfw_component_brick_measures">Medidas</label>
                                <input type="text" class="form-control form-control-sm @error('component_brick_measures') is-invalid @enderror"
                                       wire:model="component_brick_measures" id="cfw_component_brick_measures"
                                />
                                @error('component_brick_measures')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="border-bottom border-dark">Aglutinante</h6>
                        <div class="row">
                            <div class="col md-4 form-group">
                                <label for="cfw_component_binder_type">Tipo</label>
                                <input type="text" class="form-control form-control-sm @error('component_binder_type') is-invalid @enderror"
                                       wire:model="component_binder_type" id="cfw_component_binder_type"
                                />
                                @error('component_binder_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col md-4 form-group">
                                <label for="cfw_component_binder_characteristics">Caracteristicas</label>
                                <input type="text" class="form-control form-control-sm @error('component_binder_characteristics') is-invalid @enderror"
                                       wire:model="component_binder_characteristics" id="cfw_component_binder_characteristics"
                                />
                                @error('component_binder_characteristics')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col md-4 form-group">
                                <label for="cfw_component_binder_joints">Juntas</label>
                                <input type="text" class="form-control form-control-sm @error('component_binder_joints') is-invalid @enderror"
                                       wire:model="component_binder_joints" id="cfw_component_binder_joints"
                                />
                                @error('component_binder_joints')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="border-bottom border-dark">Tapial</h6>
                        <div class="row">
                            <div class="col md-6 form-group">
                                <label for="cfw_component_tapial_box">Caja</label>
                                <input type="text" class="form-control form-control-sm @error('component_tapial_box') is-invalid @enderror"
                                       wire:model="component_tapial_box" id="cfw_component_tapial_box"
                                />
                                @error('component_tapial_box')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col md-6 form-group">
                                <label for="cfw_component_tapial_height">Altura de los tablones</label>
                                <input type="text" class="form-control form-control-sm @error('component_tapial_height') is-invalid @enderror"
                                       wire:model="component_tapial_height" id="cfw_component_tapial_height"
                                />
                                @error('component_tapial_height')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="bg-info p-1 text-uppercase">Estratigrafía</h6>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_equals_to">Igual a</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_equals_to') is-invalid @enderror"
                               wire:model="stratigraphy_equals_to" id="cfw_stratigraphy_equals_to"
                        />
                        @error('stratigraphy_equals_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_equivalent">Equivale</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_equivalent') is-invalid @enderror"
                               wire:model="stratigraphy_equivalent" id="cfw_stratigraphy_equivalent"
                        />
                        @error('stratigraphy_equivalent')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_it_is_supported">Se le apoya</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_it_is_supported') is-invalid @enderror"
                               wire:model="stratigraphy_it_is_supported" id="cfw_stratigraphy_it_is_supported"
                        />
                        @error('stratigraphy_it_is_supported')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_rests_on">Se apoya en</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_rests_on') is-invalid @enderror"
                               wire:model="stratigraphy_rests_on" id="cfw_stratigraphy_rests_on"
                        />
                        @error('stratigraphy_rests_on')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_covered_by">Cubierto por</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_covered_by') is-invalid @enderror"
                               wire:model="stratigraphy_covered_by" id="cfw_stratigraphy_covered_by"
                        />
                        @error('stratigraphy_covered_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_covers_to">Cubre o se superpone a</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_covers_to') is-invalid @enderror"
                               wire:model="stratigraphy_covers_to" id="cfw_stratigraphy_covers_to"
                        />
                        @error('stratigraphy_covers_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_filled_by">Relleno por</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_filled_by') is-invalid @enderror"
                               wire:model="stratigraphy_filled_by" id="cfw_stratigraphy_filled_by"
                        />
                        @error('stratigraphy_filled_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_fills_to">Rellena a</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_fills_to') is-invalid @enderror"
                               wire:model="stratigraphy_fills_to" id="cfw_stratigraphy_fills_to"
                        />
                        @error('stratigraphy_fills_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_cut_by">Cortado por</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_cut_by') is-invalid @enderror"
                               wire:model="stratigraphy_cut_by" id="cfw_stratigraphy_cut_by"
                        />
                        @error('stratigraphy_cut_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_stratigraphy_cut_to">Corta a</label>
                        <input type="text" class="form-control form-control-sm @error('stratigraphy_cut_to') is-invalid @enderror"
                               wire:model="stratigraphy_cut_to" id="cfw_stratigraphy_cut_to"
                        />
                        @error('stratigraphy_cut_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="cfw_sketches">Croquis, planta, alzado, y seccion</label>
                        <input type="file" class="form-control form-control-sm @error('sketches') is-invalid @enderror"
                               wire:model="sketches" id="cfw_sketches"
                        />
                        @error('sketches')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="bg-info">
                        @foreach($muralStratigraphyCard->urlCroquisPublicAttribute() as $url => $pUrl)
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
                                <button type="button" class="btn btn-sm btn-danger position-absolute m-2" style="top: 0px; right: 0px; z-index: 10;"
                                        wire:click="removeSketch()"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-8 form-group">
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

                        <hr class="bg-info">
                        <div class="row">
                            @foreach($muralStratigraphyCard->urlPhotosPublicAttribute() as $url => $pUrl)
                                <div class="col-md-4">
                                    <div class="position-relative d-inline-block">
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
                                                wire:click="removePhoto('{{$url}}')"
                                        >
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="cfw_comments">Comentario</label>
                        <textarea  class="form-control form-control-sm @error('comments') is-invalid @enderror" rows="4"
                                   wire:model="comments" id="cfw_comments"
                        ></textarea>
                        @error('comments')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_num_flat">N. de plano</label>
                        <input type="text" class="form-control form-control-sm @error('num_flat') is-invalid @enderror"
                               wire:model="num_flat" id="cfw_num_flat"
                        />
                        @error('num_flat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cfw_num_photography">N. Fotografia</label>
                        <input type="text" class="form-control form-control-sm @error('num_photography') is-invalid @enderror"
                               wire:model="num_photography" id="cfw_num_photography"
                        />
                        @error('num_photography')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('closeUpdateFieldWork')">Cerrar</button>
                <button class="btn btn-sm btn-primary" type="submit">Grabar</button>
            </div>
        </form>
        <script>
            // document.addEventListener('livewire:load', () => {
            //     console.log('Componente cargado inicialmente.');
            //     inicializarPlugins();
            // });
        </script>
    </div>

</div>
