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
                    <h4 class="text-primary">{{ $material->project->name }}</h4>
                    <h5 class="text-secondary">{{ $material->id }} - Material - {{ $material->material_type }}</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('img/semar.png') }}" class="img-thumbnail float-right" alt="Logo semar" width="120">
                </div>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-2" style="display: block;">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>UE</label>
                    <div class="form-control bg-light">
                        {{ $material->ue }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label>Objecto</label>
                    <div class="form-control bg-light">
                        {{ $material->object }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label>Siglo</label>
                    <div class="form-control bg-light">
                        {{ $material->century }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Clase</label>
                    <div class="form-control bg-light">
                        {{ $material->class }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label>Fragmentos</label>
                    <div class="form-control bg-light">
                        {{ $material->fragments }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label>Forma</label>
                    <div class="form-control bg-light">
                        {{ $material->form }}
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-4 form-group">
                    <label>% de la pieza</label>
                    <div class="form-control bg-light">
                        {{ $material->piece_percentage }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label>Grosor</label>
                    <div class="form-control bg-light">
                        {{ $material->thickness }}
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label>Pasta</label>
                    <div class="form-control bg-light">
                        {{ $material->pasta }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Decoración</label>
                <div class="form-control bg-light">
                    {{ $material->decoration }}
                </div>
            </div>




            @if(strcmp($material->material_type, \App\Models\Material::MATERIAL_TYPE_CERAMIC) == 0)
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label>Altura</label>
                        <div class="form-control bg-light">
                            {{ $material->ceramic->height }}
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Ø base</label>
                        <div class="form-control bg-light">
                            {{ $material->ceramic->diameter_base }}
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Ø boca</label>
                        <div class="form-control bg-light">
                            {{ $material->ceramic->diameter_mouth }}
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Ø máximo</label>
                        <div class="form-control bg-light">
                            {{ $material->ceramic->diameter_max }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <div class="form-control bg-light">
                        {{ $material->ceramic->description }}
                    </div>
                </div>
            @elseif(strcmp($material->material_type, \App\Models\Material::MATERIAL_TYPE_TILE) == 0)
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label>Lado máximo</label>
                        <div class="form-control bg-light">
                            {{ $material->tile->side_max }}
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Lado mínimo</label>
                        <div class="form-control bg-light">
                            {{ $material->tile->side_min }}
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Notas</label>
                        <div class="form-control bg-light">
                            {{ $material->tile->notes }}
                        </div>
                    </div>
                </div>
            @endif
            
            <hr class="bg-primary">
            <label for="cfw_photos">Foto</label>
            <div class="row">
                @foreach($material->urlPhotosPublicAttribute() as $url => $pUrl)
                    <div class="col-md-3">
                        <div class="position-relative d-inline-block">
                            {{--                            <img src="{{ $pUrl }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
                            @if(strcmp($pUrl['type'], 'image') == 0)
                                <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />
                            @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                                <img src="{{ asset('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                            @else
                                <img src="{{ asset('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="img-thumbnail" />
                                <a href="{{ $pUrl['url'] }}" target="_blank" class="btn btn-link">Descargar</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('closeViewCatArch')">Cerrar</button>
        </div>
    </div>
</div>
