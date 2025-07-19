@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>Registro de cambios - {{ $structureTab->i_n_ue }}</h1>
@stop

@section('content-aque')

    <livewire:projects.change-structure-tab-log structureTabId="{{$structureTab->id}}" />

@endsection


@push('js')

@endpush
