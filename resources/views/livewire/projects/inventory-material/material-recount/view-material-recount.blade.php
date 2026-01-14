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
                    <h4 class="text-primary">{{ $materialRecount->project->name }}</h4>
                    <h5 class="text-secondary">{{ $materialRecount->id }} - Material recuento</h5>
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
                <div class="col-md-2 form-group">
                    <label>UE</label>
                    <div class="form-control bg-light">
                        {{ $materialRecount->ue }}
                    </div>
                </div>
                <div class="col-md-10 form-group">
                    <label>Cronología</label>
                    <div class="form-control bg-light">
                        {{ $materialRecount->chronology }}
                    </div>
                </div>
            </div>

            <hr class="bg-primary">
            <label for="cfw_photos">Foto</label>
            <div class="row">
                @foreach($materialRecount->urlPhotosPublicAttribute() as $url => $pUrl)
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
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('closeViewMaterialRecount')">Cerrar</button>
        </div>
    </div>
</div>
