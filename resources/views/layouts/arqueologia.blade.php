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

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@stop

@section('footer')
    <footer class="main-footer text-center">
        <strong>© {{ date('Y') }} {{  config('app.name', 'Test') }} </strong> | Versión {{  config('app.version', 'N/A') }} | Desarrollado por <a href="#">Test</a> |
        <a href="{{ route('home.integraciones') }}">Integraciones</a>
    </footer>
@endsection

@section('css')

@stop

@section('js')

@stop

@push('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            $('#logout-link').on('click', function(e) {
                e.preventDefault(); // Evita que el enlace navegue directamente
                $('#logout-form').submit(); // Envía el formulario de logout
            });
        });
    </script>
@endpush
