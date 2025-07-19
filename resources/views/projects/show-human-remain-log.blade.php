@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>Registro de cambios - {{ $humanRemain->ue }}</h1>
@stop

@section('content-aque')

    <livewire:projects.change-human-remain-log humanRemainId="{{$humanRemain->id}}" />

@endsection


@push('js')

@endpush
