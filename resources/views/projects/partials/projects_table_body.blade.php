<div class="card border-secondary mb-3">
  <div class="card-header">Lista de productos</div>
  <div class="card-body m-0 p-0">
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="table-light">
            <tr>
                <th>Fecha inicio</th>
                <th>Nombre</th>
                <th>Acronimo</th>
                <th>Expediente</th>
                <th>Cota inicial</th>
                <th>Cota final</th>
                <th></th>
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
                        <!-- Example single danger button -->
                        <div class="btn-group btn-group-sm btn-block">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item" onclick="Livewire.dispatch('openUpdateProjectModal', { project_id: '{{$project->id}}' });" title="Editar">
                                    <i class="far fa-edit"></i> Editar
                                </a>
                                <a href="{{route('projects.steps.show', ['projectId' => $project->id])}}"
                                    class="dropdown-item"
                                    title="Ver proyecto"
                                >
                                    <i class="far fa-eye"></i> Ver proyecto
                                </a>
                                @if(auth()->user()->hasRole('admin'))
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" title="Asignar usuarios" onclick="refreshProjectEditors({{$project->id}})">
                                    <i class="fas fa-user-friends"></i> Asignar usuario
                                </a>
                                <a href="{{ route('projects.show.log', ['project_id' => $project->id]) }}" class="dropdown-item" title="Registro de cambios" >
                                    <i class="fas fa-history"></i> Registrar cambios
                                </a>
                                <a href="#" class="dropdown-item text-danger" title="Eliminar"
                                onclick="Livewire.dispatch('openModalDelete', { project_id: '{{$project->id}}' });" >
                                    <i class="far fa-trash-alt"></i> Eliminar
                                </a>
                                @endif
                            </div>
                        </div>
                        
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>

{{-- Paginación --}}
<div class="d-flex justify-content-center">
    {{ $projects->links() }}
</div>
