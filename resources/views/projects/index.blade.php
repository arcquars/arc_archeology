@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>Proyectos</h1>
@stop

@section('content')
    <livewire:projects.create-project-modal />
    <livewire:projects.delete-project-modal />

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
                    <button class="btn btn-sm btn-primary" type="submit" title="Buscar...">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="{{ route('projects.index') }}" class="btn btn-sm btn-primary" title="Limpiar filtros de busqueda">
                        <i class="fas fa-eraser"></i>
                    </a>
                    <button class="btn btn-sm btn-primary" type="button" title="Crear nuevo proyecto"
{{--                            onclick="Livewire.dispatch('openModal', { title: 'Título Modal', content: 'Este es el contenido del modal111.' });">--}}
                            onclick="Livewire.dispatch('openModal');">
                        <i class="far fa-plus-square"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th class="text-center">Fecha inicio</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Acronimo</th>
                <th class="text-center">Expediente</th>
                <th class="text-center">Cuota inicial</th>
                <th class="text-center">Cuota final</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->initial_date }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->acronym }}</td>
                <td>{{ $project->expedient }}</td>
                <td>{{ $project->initial_quota }}</td>
                <td>{{ $project->final_quota }}</td>
                <td class="text-right">
                    <a href="#" class="btn btn-sm btn-link" onclick="openEditProject({{$project->id}})" title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
{{--                    <a href="{{route('ues.index', ['projectId' => $project->id])}}" class="btn btn-sm btn-link" title="Ver proyecto">--}}
{{--                        <i class="far fa-eye"></i>--}}
{{--                    </a>--}}
                    <a href="{{route('projects.steps.show', ['projectId' => $project->id])}}" class="btn btn-sm btn-link" title="Ver proyecto">
                        <i class="far fa-eye"></i>
                    </a>

                    <a href="#" class="btn btn-sm btn-link" title="Asignar usuarios">
                        <i class="fas fa-user-friends"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-danger" title="Eliminar"
                       onclick="Livewire.dispatch('openModalDelete', { project_id: '{{$project->id}}' });" >
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $projects->links() }}
    </div>
@endsection


@section('js')
    <script>
        function test12(){
            // Livewire.dispatch('mostrarModal', { mensaje: 'Hola desde Blade!' });
            Livewire.dispatch('mostrarModal');
        }

        function openEditProject(id){
            alert(id);
        }

        document.addEventListener('livewire:initialized', () => {
            Livewire.on('reloadPageLi', () => {
                window.location.reload();
            });
        });
    </script>
@endsection
