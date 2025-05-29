@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if (session()->has('status'))
        <x-adminlte-alert theme="{{ session('status.type') }}" title="{{ ucfirst(session('status.type')) }}" dismissable>
            {{ session('status.message') }}
        </x-adminlte-alert>
    @endif
    <div x-data="{ show: false, type: 'info', message: 'dsdsds' }"
         @show_alert.window="
         console.log('ddd', $event.detail.type);
        show = true;
        type = $event.detail.type;
        message = $event.detail.message;
        setTimeout(() => { show = false; }, 5000);
    "
         x-show="show"
         x-transition
         style="display: none;"
         class="mb-3"
    >
        <div :class="`alert alert-${type} alert-dismissible fade show`" role="alert">
            <span x-text="message"></span>
            <button type="button" class="btn-close" @click="show = false" aria-label="Close"></button>
        </div>
    </div>
    @yield('content-aque')
@stop

@section('css')

@stop

@section('js')

@stop
