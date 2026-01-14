<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="updateMaterialRecount">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Editar Material Recuento</div>
            <div class="card-body text-secondary p-2">
                <div class="row">
                    <div class="col-md-2 form-group">
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
                    <div class="col-md-10 form-group">
                        <label for="imm-object">Cronología</label>
                        <input type="text" class="form-control form-control-sm @error('chronology') is-invalid @enderror"
                               wire:model="chronology" id="imm-chronology"
                        >
                        @error('chronology')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="bg-info">
                <div class="form-group">
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
                </div>
                <div class="row">
                    @foreach($materialRecount->urlPhotosPublicAttribute() as $url => $pUrl)
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
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('closeUpdateMaterialRecount')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Grabar</button>
            </div>
        </div>
    </form>
</div>
