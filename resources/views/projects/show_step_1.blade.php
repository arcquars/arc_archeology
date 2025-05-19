{{--@extends('layouts.arqueologia')--}}
@extends('adminlte::page')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content')
    @include('projects.partials._menu_steps', ['step' => $step])

    @livewire('projects.menu-field-work', ['projectId' => $project->id])

@endsection

@push('js')
    <script>
        // document.addEventListener('alpine:init', () => {
        //     console.log("zzz ppp 1");
        // });
        //
        // document.addEventListener('livewire:initialized', () => {
        //     console.log("zzz ppp 1.2");
        //     Livewire.on('show-notificacion', () => {
        //         console.log("Evento 'archivos-seleccionados' recibido.");
        //         inicializarFileInputs();
        //     });
        // });
        //
        // function inicializarFileInputs() {
        //     console.log("zzz ppp 4.1 (evento)");
        //     document.querySelectorAll('.custom-file-input').forEach(function (input) {
        //         console.log("zzz ppp 4.2 (evento)");
        //         input.addEventListener('change', function (e) {
        //             console.log("zzz ppp 4.3 (evento)");
        //             let fileName = Array.from(this.files).map(f => f.name).join(', ');
        //             let label = this.nextElementSibling;
        //             if (label && label.classList.contains('custom-file-label')) {
        //                 label.textContent = fileName;
        //             }
        //         });
        //     });
        // }
    </script>
@endpush

