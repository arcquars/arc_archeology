@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>Auditoria</h1>
@stop

@section('content-aque')
    {{-- Formulario de Filtros --}}
    <div class="card">
        <div class="card-header">
            <h3>Filtros del Log de Auditoría</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('audit.log') }}">
                <div class="row g-3">
                    {{-- Filtro por Fecha de Inicio --}}
                    <div class="col-md-3">
                        <label for="dateStart" class="form-label">Desde</label>
                        <input type="date" class="form-control" id="dateStart" name="filter_date_start" value="{{ request('filter_date_start') }}">
                    </div>

                    {{-- Filtro por Fecha de Fin --}}
                    <div class="col-md-3">
                        <label for="dateEnd">Hasta</label>
                        <input type="date" class="form-control" id="dateEnd" name="filter_date_end" value="{{ request('filter_date_end') }}">
                    </div>

                    {{-- Filtro por Tabla (Modelo) --}}
                    <div class="col-md-3">
                        <label for="table">Tabla</label>
                        <select class="form-control" id="table" name="filter_table">
                            <option value="">Todas las tablas</option>
                            @foreach($auditableTypes as $type)
                                <option value="{{ $type }}" {{ request('filter_table') == $type ? 'selected' : '' }}>
                                    {{ Str::afterLast($type, '\\') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filtro por Usuario --}}
                    <div class="col-md-3">
                        <label for="user" class="form-label">Usuario</label>
                        <select class="form-control" id="user" name="filter_user">
                            <option value="">Todos los usuarios</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ request('filter_user') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        <a href="{{ route('audit.log') }}" class="btn btn-secondary">Limpiar Filtros</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabla de Resultados --}}
    <div class="card mt-4">
        <div class="card-header">
            <h3>Resultados</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Evento</th>
                        <th>Tabla</th>
                        <th>ID Registro</th>
                        <th>Valores Antiguos</th>
                        <th>Valores Nuevos</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($audits as $audit)
                        <tr>
                            <td>{{ $audit->user->name ?? 'Sistema' }}</td>
                            <td>
                                @if($audit->event == 'created')
                                    <span class="badge bg-success">CREADO</span>
                                @elseif($audit->event == 'updated')
                                    <span class="badge bg-warning text-dark">ACTUALIZADO</span>
                                @elseif($audit->event == 'deleted')
                                    <span class="badge bg-danger">ELIMINADO</span>
                                @else
                                    <span class="badge bg-secondary">{{ strtoupper($audit->event) }}</span>
                                @endif
                            </td>
                            <td>{{ Str::afterLast($audit->auditable_type, '\\') }}</td>
                            <td>{{ $audit->auditable_id }}</td>
                            <td>
                                @if($audit->old_values)
                                    <pre style="max-height: 150px; overflow-y: auto; background-color: #f8f9fa; padding: 5px;"><code>{{ json_encode($audit->old_values, JSON_PRETTY_PRINT) }}</code></pre>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($audit->new_values)
                                    <pre style="max-height: 150px; overflow-y: auto; background-color: #f8f9fa; padding: 5px;"><code>{{ json_encode($audit->new_values, JSON_PRETTY_PRINT) }}</code></pre>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $audit->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No se encontraron registros que coincidan con los filtros.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Enlaces de Paginación --}}
            <div class="mt-3 d-flex justify-content-center">
                {{-- appends() es crucial para que los enlaces mantengan los filtros aplicados --}}
                {{ $audits->links() }}
            </div>
        </div>
    </div>

    {{-- Opcional: Script de jQuery para mejoras de UI --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Ejemplo de cómo podrías usar jQuery para mejorar la UI.
            // Esto es opcional, el formulario funciona sin esto.

            // Por ejemplo, podrías usar una librería como Select2 para hacer los selects más amigables
            // if ($.fn.select2) {
            //     $('#table').select2();
            //     $('#user').select2();
            // }

            // O usar un datepicker para los campos de fecha
            // if ($.fn.datepicker) {
            //     $('#dateStart').datepicker({ dateFormat: 'yy-mm-dd' });
            //     $('#dateEnd').datepicker({ dateFormat: 'yy-mm-dd' });
            // }
        });
    </script>
@endpush
