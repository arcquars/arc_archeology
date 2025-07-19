<div>


    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">
                Evento
            </th>
            <th scope="col">
                Fecha
            </th>
            <th scope="col">
                Nombre
            </th>
            <th scope="col">
                Datos
            </th>
{{--            <th scope="col">Datos Nuevos</th>--}}
            <th scope="col">Usuario</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($auditsWithProjects as $auditsWithProject)
            <tr>
                <td>{{ $auditsWithProject->event }}</td>
                <td>{{ $auditsWithProject->project_date }}</td>
                <td>{{ $auditsWithProject->project_name }}</td>
                <td>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Dato</th>
                            <th>V. antiguo</th>
                            <th>V. nuevo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auditsWithProject->old_values as $key => $value)
                            <tr>
                                <td>{{ __('messages.'.$key) }}</td>
                                <td>{{$value}}</td>
                                <td>{{$auditsWithProject->new_values[$key]}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </td>
{{--                <td>{{ json_encode($auditsWithProject->new_values) }}</td>--}}
                <td>{{ $auditsWithProject->username }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No se encontraron registros.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $auditsWithProjects->links() }}
    </div>
</div>
