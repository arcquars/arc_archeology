@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Proyectos</h1>
        @if(auth()->user()->hasRole('admin'))
            <button class="btn btn-sm btn-arqueologia-primary" type="button" title="Crear nuevo proyecto"
                    onclick="Livewire.dispatch('openModal');">
                <i class="far fa-plus-square"></i>
                Nuevo proyecto
            </button>
        @endif
    </div>
@stop

@section('content-aque')
    <livewire:projects.create-project-modal />
    <livewire:projects.delete-project-modal />
    <livewire:projects.update-project-modal />

    <div class="filters-card">
        <form id="fProjectSearch" action="{{ route('projects.index') }}" method="GET">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="pName">Nombre proyecto</label>
                    <input type="text" class="form-control form-control-sm" id="pName" name="name" placeholder="" value="{{ request('name') }}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="pAcronym">Acronimo</label>
                    <input type="text" class="form-control form-control-sm" id="pAcronym" name="acronym" placeholder="" value="{{ request('acronym') }}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="pDossier"># expediente</label>
                    <input type="text" class="form-control form-control-sm" id="pDossier" placeholder="" name="expedient" value="{{ request('expedient') }}">
                </div>
                <div class="col-md-3 d-flex flex-column justify-content-end">
                    <div class="form-group">
                        <button class="btn btn-sm btn-danger" type="submit" title="Buscar...">
                            <i class="fas fa-search"></i>
                        </button>
                        <a href="{{ route('projects.index') }}" class="btn btn-sm btn-arqueologia-brown" title="Limpiar filtros de busqueda">
                            <i class="fas fa-eraser"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <div class="table-responsive">
        @include('projects.partials.projects_table_body', ['projects' => $projects])
    </div>

    <livewire:projects.asign-editor />
    <livewire:projects.unassign-editor-modal />
@endsection


@push('js')
    <script>
        function test12(){
            // Livewire.dispatch('mostrarModal', { mensaje: 'Hola desde Blade!' });
            Livewire.dispatch('mostrarModal');
        }

        function openEditProject(id){
            alert(id);
        }

        function refreshProjectEditors(id){
            Livewire.dispatch('updateProjectId', {'value': id});
        }

        document.addEventListener('livewire:initialized', () => {
            Livewire.dispatch('reloadPageLi', () => {
                window.location.reload();
            });
        });
    </script>
@endpush
