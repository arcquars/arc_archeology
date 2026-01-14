<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="updateMaterial">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Editar Material</div>
            <div class="card-body text-secondary p-2">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="imm-ue">UE</label>
                        {{-- <input type="text" class="form-control form-control-sm @error('ue') is-invalid @enderror"
                               wire:model="ue" id="imm-ue" disabled
                        > --}}
                        <select wire:model="ue" id="imm-ue" class="form-control form-control-sm @error('ue') is-invalid @enderror">
                            @foreach($ues as $ue1)
                                <option value="{{ $ue1->n_ue }}">{{ $ue1->n_ue }}</option>
                            @endforeach
                        </select>
                        @error('ue')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="imm-object">Objecto</label>
                        <input type="text" class="form-control form-control-sm @error('object') is-invalid @enderror"
                               wire:model="object" id="imm-object"
                        >
                        @error('object')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="imm-century">Siglo</label>
                        <input type="text" class="form-control form-control-sm @error('century') is-invalid @enderror"
                               wire:model="century" id="imm-century"
                        >
                        @error('century')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="imm-class">Clase</label>
                        <input type="text" class="form-control form-control-sm @error('class') is-invalid @enderror"
                               wire:model="class" id="imm-class"
                        >
                        @error('class')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="imm-fragments">Fragmentos</label>
                        <input type="number" class="form-control form-control-sm @error('fragments') is-invalid @enderror"
                               wire:model="fragments" id="imm-fragments"
                        >
                        @error('fragments')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="imm-form">Forma</label>
                        <input type="text" class="form-control form-control-sm @error('form') is-invalid @enderror"
                               wire:model="form" id="imm-form"
                        >
                        @error('form')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="imm-piece_percentage">% de la pieza</label>
                        <input type="number" step="0.01" class="form-control form-control-sm @error('piece_percentage') is-invalid @enderror"
                               wire:model="piece_percentage" id="imm-piece_percentage"
                        >
                        @error('piece_percentage')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="imm-thickness">Grosor</label>
                        <input type="number" step="0.01" class="form-control form-control-sm @error('thickness') is-invalid @enderror"
                               wire:model="thickness" id="imm-thickness"
                        >
                        @error('thickness')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="imm-pasta">Pasta</label>
                        <input type="text" class="form-control form-control-sm @error('pasta') is-invalid @enderror"
                               wire:model="pasta" id="imm-pasta"
                        >
                        @error('pasta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="imm-decoration">Decoración</label>
                    <textarea name="" id="imm-decoration" rows="3" class="form-control form-control-sm @error('decoration') is-invalid @enderror"
                              wire:model="decoration"
                    ></textarea>
                    @error('decoration')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="@error('material_type') is-invalid @enderror">
                        <label for="">Tipo material</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('material_type') is-invalid @enderror" type="radio"  id="imm-ceramica" value="{{ \App\Models\Material::MATERIAL_TYPE_CERAMIC }}"
                               wire:model="material_type" wire:change="showType('{{ \App\Models\Material::MATERIAL_TYPE_CERAMIC }}')" disabled
                        >
                        <label class="form-check-label" for="imm-ceramica">{{ \App\Models\Material::MATERIAL_TYPE_CERAMIC }}</label>

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="imm-azulejos" value="{{ \App\Models\Material::MATERIAL_TYPE_TILE }}"
                               wire:model="material_type" wire:change="showType('{{ \App\Models\Material::MATERIAL_TYPE_TILE }}')" disabled
                        >
                        <label class="form-check-label" for="imm-azulejos">{{ \App\Models\Material::MATERIAL_TYPE_TILE }}</label>
                    </div>
                    @error('material_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                @if(strcmp($changeType, \App\Models\Material::MATERIAL_TYPE_CERAMIC) == 0)
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="imm-height">Altura</label>
                            <input type="number" step="0.01" class="form-control form-control-sm @error('height') is-invalid @enderror"
                                   wire:model="height" id="imm-height"
                            >
                            @error('height')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="imm-diameter_base">Ø base</label>
                            <input type="number" step="0.01" class="form-control form-control-sm @error('diameter_base') is-invalid @enderror"
                                   wire:model="diameter_base" id="imm-diameter_base"
                            >
                            @error('diameter_base')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="imm-diameter_mouth">Ø boca</label>
                            <input type="number" step="0.01" class="form-control form-control-sm @error('diameter_mouth') is-invalid @enderror"
                                   wire:model="diameter_mouth" id="imm-diameter_mouth"
                            >
                            @error('diameter_mouth')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="imm-diameter_max">Ø máximo</label>
                            <input type="number" step="0.01" class="form-control form-control-sm @error('diameter_max') is-invalid @enderror"
                                   wire:model="diameter_max" id="imm-diameter_max"
                            >
                            @error('diameter_max')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imm-description">Descripción</label>
                        <textarea name="" id="imm-description" rows="3" class="form-control form-control-sm @error('description') is-invalid @enderror"
                                  wire:model="description"
                        ></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @elseif(strcmp($changeType, \App\Models\Material::MATERIAL_TYPE_TILE) == 0)
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="imm-side_max">Lado máximo</label>
                            <input type="number" step="0.01" class="form-control form-control-sm @error('side_max') is-invalid @enderror"
                                   wire:model="side_max" id="imm-side_max"
                            >
                            @error('side_max')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="imm-side_min">Lado mínimo</label>
                            <input type="number" step="0.01" class="form-control form-control-sm @error('side_min') is-invalid @enderror"
                                   wire:model="side_min" id="imm-side_min"
                            >
                            @error('side_min')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="imm-notes">Notas</label>
                            <textarea name="" id="imm-notes" rows="3" class="form-control form-control-sm @error('notes') is-invalid @enderror"
                                      wire:model="notes"
                            ></textarea>
                            @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <label for="ea-photos">Fotografias</label>
                        <input type="file" class="form-control form-control-sm @error('photos.*') is-invalid @enderror"
                               wire:model="photos" id="ea-photos" multiple
                        />
                        @error('photos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @error('photos.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <hr class="bg-info">
                        <div class="row">
                            @foreach($material->urlPhotosPublicAttribute() as $url => $pUrl)
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
            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('closeCreateMuseable')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Grabar</button>
            </div>
        </div>
    </form>
</div>
