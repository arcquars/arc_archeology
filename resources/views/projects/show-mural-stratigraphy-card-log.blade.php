@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>Registro de cambios - {{ $muralStratigraphyCard->i_n_ue }}</h1>
@stop

@section('content-aque')

    <livewire:projects.change-mural-stratigraphy-card-log muralCardId="{{$muralStratigraphyCard->id}}" />

@endsection


@push('js')

@endpush
