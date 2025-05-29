@extends('layouts.arqueologia')
{{--@extends('adminlte::page')--}}

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content-aque')
    @include('projects.partials._menu_steps', ['step' => $step])
{{--    <h4 class="mt-2">Inventario de materiales</h4>--}}
    @livewire('projects.menu-materials-inventory', ['projectId' => $project->id])

@endsection

@push('js')
    <script>

    </script>
@endpush

