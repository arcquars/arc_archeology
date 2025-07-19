@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>Registro de cambios - {{ $project->name }}</h1>
@stop

@section('content-aque')

    <livewire:projects.change_log projectId="{{$project->id}}" />

@endsection


@push('js')

@endpush
