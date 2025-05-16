<div>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="pName">Fecha</label>
            <input type="text" class="form-control form-control-sm" id="pName" name="name" placeholder="" value="{{ request('name') }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="pAcronym">UE</label>
            <input type="text" class="form-control form-control-sm" id="pAcronym" name="acronym" placeholder="" value="{{ request('acronym') }}">
        </div>
        <div class="col-md-3 d-flex flex-column justify-content-end">
            <div class="form-group">
                <button class="btn btn-sm btn-primary" type="submit" title="Buscar...">
                    <i class="fas fa-search"></i>
                </button>
                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-primary" title="Limpiar filtros de busqueda">
                    <i class="fas fa-eraser"></i>
                </a>
                <button class="btn btn-sm btn-primary" type="button" title="Crear nuevo proyecto"
                        {{--                            onclick="Livewire.dispatch('openModal', { title: 'Título Modal', content: 'Este es el contenido del modal111.' });">--}}
                        wire:click="$dispatch('toggleCreateFieldWork')"
{{--                        onclick="Livewire.dispatch('toggle');"--}}
                >
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>
</div>
