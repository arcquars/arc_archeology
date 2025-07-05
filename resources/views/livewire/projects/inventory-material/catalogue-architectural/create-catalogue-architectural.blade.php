<div>
    <div wire:loading class="mt-2">
        <div class="fa-1x">
            <i class="fas fa-cog fa-spin"></i>
        </div>
    </div>
    <div wire:loading>
        Cargando...
    </div>
    <form wire:submit.prevent="saveCatalogueArchitectural">
        <div class="card border border-info mb-2 mt-2">
            <div class="card-header p-2 text-info">Crear Elemento arquitectonico</div>
            <div class="card-body text-secondary p-2">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="ea-proceed_date_admission">Fecha de ingreso</label>
                        <input type="date" class="form-control form-control-sm @error('proceed_date_admission') is-invalid @enderror"
                               wire:model="proceed_date_admission" id="ea-proceed_date_admission"
                        />
                        @error('proceed_date_admission')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="ea-proceed_source_admission">Fuente de ingreso</label>
                        <input type="text" class="form-control form-control-sm @error('proceed_source_admission') is-invalid @enderror"
                               wire:model="proceed_source_admission" id="ea-proceed_source_admission"
                        />
                        @error('proceed_source_admission')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="ea-proceed_origin">Procedencia</label>
                        <input type="text" class="form-control form-control-sm @error('proceed_origin') is-invalid @enderror"
                               wire:model="proceed_origin" id="ea-proceed_origin"
                        />
                        @error('proceed_origin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 row">
                        <div class="col-md-6 form-group">
                            <label for="ea-proceed_acronym">Acrónimo</label>
                            <input type="text" class="form-control form-control-sm @error('proceed_acronym') is-invalid @enderror"
                                   wire:model="proceed_acronym" id="ea-proceed_acronym"
                            />
                            @error('proceed_acronym')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="ea-proceed_ue">UE</label>
                            <input type="text" class="form-control form-control-sm @error('proceed_ue') is-invalid @enderror"
                                   wire:model="proceed_ue" id="ea-proceed_ue" @if(!$enableUe) disabled @endif
                            />
                            @error('proceed_ue')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ea-c_classification">Clasificación</label>
                    <textarea class="form-control form-control-sm @error('c_classification') is-invalid @enderror" rows="3"
                              wire:model="c_classification" id="ea-c_classification"
                    ></textarea>
                    @error('c_classification')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="ea-c_common_name">Nombre Común</label>
                        <input type="text" class="form-control form-control-sm @error('c_common_name') is-invalid @enderror"
                               wire:model="c_common_name" id="ea-c_common_name"
                        >
                        @error('c_common_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="ea-c_specific_name">Nombre Específico</label>
                        <input type="text" class="form-control form-control-sm @error('c_specific_name') is-invalid @enderror"
                               wire:model="c_specific_name" id="ea-c_specific_name"
                        >
                        @error('c_specific_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="ea-c_dating">Datación</label>
                        <input type="text" class="form-control form-control-sm @error('c_dating') is-invalid @enderror"
                               wire:model="c_dating" id="ea-c_dating"
                        >
                        @error('c_dating')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="ea-c_integrity_status">Estado integridad</label>
                        <input type="text" class="form-control form-control-sm @error('c_integrity_status') is-invalid @enderror"
                               wire:model="c_integrity_status" id="ea-c_integrity_status"
                        >
                        @error('c_integrity_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="ea-a_acronyms">Siglas</label>
                        <input type="text" class="form-control form-control-sm @error('a_acronyms') is-invalid @enderror"
                               wire:model="a_acronyms" id="ea-a_acronyms"
                        >
                        @error('a_acronyms')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="ea-a_location">Ubicación sigla</label>
                        <input type="text" class="form-control form-control-sm @error('a_location') is-invalid @enderror"
                               wire:model="a_location" id="ea-a_location"
                        >
                        @error('a_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="ea-location_date">Fecha</label>
                        <input type="date" class="form-control form-control-sm @error('location_date') is-invalid @enderror"
                               wire:model="location_date" id="ea-location_date"
                        >
                        @error('location_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="ea-location">Ubicación</label>
                        <input type="text" class="form-control form-control-sm @error('location') is-invalid @enderror"
                               wire:model="location" id="ea-location"
                        >
                        @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="ea-location_notes">Notas</label>
                    <textarea class="form-control form-control-sm @error('location_notes') is-invalid @enderror" rows="3"
                              wire:model="location_notes" id="ea-location_notes"
                    ></textarea>
                    @error('location_notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="bg-info p-1 text-center mb-1">Dimensiones (cm)</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="ea-dimension_long">Long</label>
                        <input type="number" step="0.01" class="form-control form-control-sm @error('dimension_long') is-invalid @enderror"
                               wire:model="dimension_long" id="ea-dimension_long"
                        >
                        @error('dimension_long')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="ea-dimension_anch">Anch</label>
                        <input type="number" step="0.01" class="form-control form-control-sm @error('dimension_anch') is-invalid @enderror"
                               wire:model="dimension_anch" id="ea-dimension_anch"
                        >
                        @error('dimension_anch')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="ea-dimension_alt">Alt</label>
                        <input type="number" step="0.01" class="form-control form-control-sm @error('dimension_alt') is-invalid @enderror"
                               wire:model="dimension_alt" id="ea-dimension_alt"
                        >
                        @error('dimension_alt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="ea-dimension_other">Otras</label>
                        <input type="number" step="0.01" class="form-control form-control-sm @error('dimension_other') is-invalid @enderror"
                               wire:model="dimension_other" id="ea-dimension_other"
                        >
                        @error('dimension_other')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="bg-info">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="ea-subject">Materia</label>
                        <input type="text" class="form-control form-control-sm @error('subject') is-invalid @enderror"
                               wire:model="subject" id="ea-subject"
                        >
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="ea-technique">Técnica</label>
                        <input type="text" class="form-control form-control-sm @error('technique') is-invalid @enderror"
                               wire:model="technique" id="ea-technique"
                        >
                        @error('technique')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="ea-description">Descripción</label>
                    <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" rows="3"
                              wire:model="description" id="ea-description"
                    ></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ea-conservation_status">Estado conservación</label>
                            <input type="text" class="form-control form-control-sm @error('conservation_status') is-invalid @enderror"
                                   wire:model="conservation_status" id="ea-conservation_status"
                            >
                            @error('conservation_status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ea-author">Autor</label>
                            <input type="text" class="form-control form-control-sm @error('author') is-invalid @enderror"
                                   wire:model="author" id="ea-author"
                            >
                            @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="ea-comments">Observaciones</label>
                        <textarea class="form-control form-control-sm @error('comments') is-invalid @enderror" rows="5"
                                  wire:model="comments" id="ea-comments"
                        ></textarea>
                        @error('comments')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <label for="ea-sketch">Croquis</label>
                        <input type="file" class="form-control form-control-sm @error('sketch') is-invalid @enderror"
                               wire:model="sketch" id="ea-sketch"
                        />
                        @error('sketch')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top border-width-2 text-right p-2">
                <button class="btn btn-sm btn-dark" type="button" wire:click="$dispatch('closeCreateFieldWork')">Cerrar</button>
                <button class="btn btn-sm btn-info" type="submit">Crear</button>
            </div>
        </div>
    </form>
</div>
