@extends('layouts.arqueologia')
{{--@extends('adminlte::page')--}}

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content-aque')
    @include('projects.partials._menu_steps', ['step' => $step])

    @livewire('projects.menu-field-work', ['projectId' => $project->id])


@endsection

@push('js')
    <script>

    </script>
@endpush

