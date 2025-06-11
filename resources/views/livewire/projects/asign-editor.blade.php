<div>
    @if($project)
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title text-primary">Proyecto: {{ $project->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
            <button class="btn btn-sm btn-primary mb-2" onclick="@this.dispatch('openUserSearchModal', { projectId: {{ $project->id }} })"><i class="far fa-plus-square"></i></button>
            @livewire('users.user-search-assign-modal')
            <div class="table-responsive">
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($project->users) > 0)
                    @foreach($project->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                {{ $user->roles->pluck('name')->join(', ') }}
                            </td>
                            <td class="text-right">
                                <a href="#" class="btn btn-link text-danger" onclick="@this.dispatch('openUnassignedEditorModal', { projectId: {{ $project->id }}, userId: {{ $user->id }} })">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center">Sin usuarios asignados en el proyecto</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-right">
            <button type="button" class="btn btn-sm btn-secondary" data-card-widget="remove">
                Cerrar
            </button>
        </div>
    </div>
        </div>
    @endif

</div>
