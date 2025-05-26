{{--@extends('layouts.arqueologia')--}}
@extends('adminlte::page')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content')
    @include('projects.partials._menu_steps', ['step' => $step])

    <form method="POST" action="{{ route('projects.save_preliminary_report', ['projectId' => $project->id]) }}">
        @csrf
        <div class="form-group">
            <label for="p-preliminary_report">Informe preliminar</label>
            <textarea name="preliminary_report" id="p-preliminary_report" class="form-control" rows="10">{{ $project->preliminary_report }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-sm">Grabar</button>
            </div>
        </div>
    </form>

@endsection

@push('js')
    <script>

    </script>
@endpush

