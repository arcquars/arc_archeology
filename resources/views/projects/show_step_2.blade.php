{{--@extends('layouts.arqueologia')--}}
@extends('adminlte::page')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content')
    @include('projects.partials._menu_steps', ['step' => $step])
    <h4 class="mt-2">Inventario de materiales</h4>

@endsection

@push('js')
    <script>

    </script>
@endpush

