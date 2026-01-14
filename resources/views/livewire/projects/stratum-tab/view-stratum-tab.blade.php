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
                    <h4 class="text-primary">{{ $stratumCard->project->name }}</h4>
                    <h5 class="text-secondary">{{ $stratumCard->i_n_ue }} - Ficha de estrato</h5>
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
                        {{ $stratumCard->i_date }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_location_intervention">Localización en la intervención</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_location_intervention }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_acronym">Acrónimo</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_acronym }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_n_ue">N. UE</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_n_ue }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Sector</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_fact }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Datación provisional</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_provisional_dating }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Fiabilidad estratigráfica</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_stratigraphic_reliability }}
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="sc-i_type">Interpretación</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->i_type }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="sc-i_type">Conservación</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->conservation }}
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="sc-i_type">Interpretación</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->interpretation }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="sc-i_type">Fracción fina</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->fine_fraction }}
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="sc-i_type">Fracción gruesa</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->coarse_fraction }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Descripción</label>
                    <div class="bg-light p-1 border rounded">
                        {{ $stratumCard->interpretation_description }}
                    </div>
                </div>
                <div class="col-md-6">
                    @foreach($stratumCard->urlInterpretacionFilePublicAttribute() as $url => $pUrl)
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
            <div class="row">
                <div class="col-md-12">
                    <h5 class="bg-primary p-1 text-center">COMPOSICIÓN</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">ORGÁNICA</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->organic_composition }}
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">INORGÁNICA</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->inorganic_composition }}
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <h5 class="bg-primary p-1 text-center">ESTRATIGRAFÍA</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Igual a</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_equals }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Se le apoya</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_support_provided }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Cubierto por</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_covered_by }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Relleno por</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_filling_by }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Cortado por</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_cut_by }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Equivale</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_equivale }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Se apoya en</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_supported_by }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Cubre o se superpone a</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_overlaps_or_covers }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label>Rellena a</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_fill_in }}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Corta a</label>
                    <div class="form-control bg-light">
                        {{ $stratumCard->stratigraphy_cut_to }}
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>


            <div class="row mt-2">
                <div class="col-md-12">
                    <h5 class="bg-primary p-1 text-center">COTAS</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @foreach($stratumCard->urlCroquisPublicAttribute() as $url => $pUrl)
                        <div class="position-relative d-inline-block">
{{--                            <img src="{{ $url }}" alt="Imagen desde Wasabi" class="img-thumbnail mb-1" />--}}
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
                    @endforeach
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th colspan="3" class="text-center">Cotas</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Sup.</th>
                                <th>Inf.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quotes as $index => $quote)
                                <tr>
                                    <td class="text-center">{{$index}}</td>
                                    <td>{{ $quote->surface }}</td>
                                    <td>{{ $quote->information }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <hr class="bg-primary">
            <div class="form-group">
                <label>Comentario</label>
                <div class="bg-light p-1 border rounded">
                    {{ $stratumCard->comment }}
                </div>
            </div>
            <div class="form-group">
                <label>Volumen de material</label>
                <div class="form-control bg-light">
                    {{ $stratumCard->volume_material }}
                </div>
            </div>

            @include('livewire.projects.stratum-tab.partials._stratum-meta-view-materials', ['stratumCardMeta' => $stratumCard->meta ])
            @include('livewire.projects.stratum-tab.partials._stratum-meta-view-recovered', ['stratumCardMeta' => $stratumCard->meta ])
            @include('livewire.projects.stratum-tab.partials._stratum-meta-view-stratum', ['stratumCardMeta' => $stratumCard->meta ])

            <hr class="bg-primary">

            <div class="form-group">
                <label>Descripción</label>
                <div class="bg-light p-1 border rounded">
                    {{ $stratumCard->description }}
                </div>
            </div>
            <hr class="bg-primary">
            <label for="cfw_photos">Fotografías</label>
            <div class="row">
                @foreach($stratumCard->urlPhotosPublicAttribute() as $url => $pUrl)
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
        <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
            <button class="btn btn-sm btn-dark" wire:click="$dispatch('close-stratum-card-view')">Cerrar</button>
        </div>
    </div>
</div>
