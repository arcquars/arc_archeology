@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - UEs')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content')
    <livewire:ue.create-ue-modal />

    <div class="border border-secondary-subtle p-2 rounded">
        <div class="row">
            <div class="col-md-6">
                <dl class="dl-arq">
                    <dt>Acronimo</dt>
                    <dd>{{ $project->acronym }}</dd>
                    <dt>Cuota inicial</dt>
                    <dd>{{ $project->initial_quota }}</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt># Expediente</dt>
                    <dd>{{ $project->expedient }}</dd>
                    <dt>Cuota inicial</dt>
                    <dd>{{ $project->final_quota }}</dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <dl>
                    <dt>UTM</dt>
                    <dd>{{ $project->utm }}</dd>
                </dl>
            </div>
        </div>
    </div>
    <fieldset class="border rounded p-2 fieldset-arq">
        <legend class="control-label customer-legend pl-2 pr-2">UE's</legend>
        <form id="fUesSearch" action="{{ route('ues.index', ['projectId' => $project->id]) }}" method="GET">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="ueCode">Codigo UE</label>
                    <input type="text" class="form-control form-control-sm" id="ueCode" name="code" placeholder="" value="{{ request('code') }}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="ueCovered">Cubierto por</label>
                    <input type="text" class="form-control form-control-sm" id="ueCovered" name="covered" placeholder="" value="{{ request('covered') }}">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-end">
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" type="submit" title="Buscar...">
                            <i class="fas fa-search"></i>
                        </button>
                        <a href="{{ route('ues.index', ['projectId' => $project->id]) }}" class="btn btn-sm btn-primary" title="Limpiar filtros de busqueda">
                            <i class="fas fa-eraser"></i>
                        </a>
                        <a class="btn btn-sm btn-primary" type="button" title="Crear nuevo UE"
{{--                            href="{{ route('ues.create', ['projectId' => $project->id]) }}" --}}
                            href="#" onclick="Livewire.dispatch('openModalUe', {projectId: '{{$project->id}}'});" >
                            <i class="far fa-plus-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th class="text-center">Codigo</th>
                    <th class="text-center">Cubierto por</th>
                    <th class="text-center">Cubre a</th>
                    <th class="text-center">Datacion</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ues as $ue)
                    <tr>
                        <td>{{ $ue->code }}</td>
                        <td>{{ $ue->covered_by }}</td>
                        <td>{{ $ue->covers_to }}</td>
                        <td>{{ $ue->dating }}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-sm btn-link" onclick="openEditProject({{$ue->id}})" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{route('ues.show', ['ueId' => $ue->id])}}" class="btn btn-sm btn-link" title="Ver UI">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger" title="Eliminar"
                               onclick="Livewire.dispatch('openModalDelete', { ue_id: '{{$ue->id}}' });" >
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $ues->links() }}
        </div>

    </fieldset>


@endsection


@section('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('reloadPageLi', () => {
                window.location.reload();
            });
        });
    </script>
@endsection
