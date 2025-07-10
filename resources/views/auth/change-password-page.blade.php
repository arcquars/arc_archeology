{{-- resources/views/auth/change-password-page.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cambiar Contraseña')

@section('content_header')
    <h1>Cambiar Contraseña</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3"> {{-- Centrar el formulario --}}
            @livewire('change-password')
        </div>
    </div>
@stop

@section('css')
    {{-- Agrega CSS personalizado si es necesario --}}
@stop

@section('js')
    {{-- Si necesitas JS personalizado, va aquí --}}
    {{-- Asegúrate de que los scripts de Livewire estén incluidos en tu layout principal --}}
{{--    @livewireScripts--}}
@stop
