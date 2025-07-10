<table class="table table-sm">
    <thead>
    <tr>
        <th class="text-center">Fecha inicio</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Acronimo</th>
        <th class="text-center">Expediente</th>
        <th class="text-center">Cota inicial</th>
        <th class="text-center">Cota final</th>
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
            <td class="text-right">{{ $project->initial_quota }}</td>
            <td class="text-right">{{ $project->final_quota }}</td>
            <td class="text-right">
                {{--                    <a href="#" class="btn btn-sm btn-link" onclick="openEditProject({{$project->id}})" title="Editar">--}}
                <a href="#" class="btn btn-sm btn-link" onclick="Livewire.dispatch('openUpdateProjectModal', { project_id: '{{$project->id}}' });" title="Editar">
                    <i class="far fa-edit"></i>
                </a>
                {{--                    <a href="{{route('ues.index', ['projectId' => $project->id])}}" class="btn btn-sm btn-link" title="Ver proyecto">--}}
                {{--                        <i class="far fa-eye"></i>--}}
                {{--                    </a>--}}
                <a href="{{route('projects.steps.show', ['projectId' => $project->id])}}" class="btn btn-sm btn-link" title="Ver proyecto">
                    <i class="far fa-eye"></i>
                </a>

                @if(auth()->user()->hasRole('admin'))
                <a href="#" class="btn btn-sm btn-link" title="Asignar usuarios" onclick="refreshProjectEditors({{$project->id}})">
                    <i class="fas fa-user-friends"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger" title="Eliminar"
                   onclick="Livewire.dispatch('openModalDelete', { project_id: '{{$project->id}}' });" >
                    <i class="far fa-trash-alt"></i>
                </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{-- Paginación --}}
<div class="d-flex justify-content-center">
    {{ $projects->links() }}
</div>
