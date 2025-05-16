@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content')
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-sm bg-blue">
            <input type="radio" name="options" value="1" autocomplete="off" @if($step == 1) checked @endif> 1. Trabajo de campo
        </label>
        <label class="btn btn-sm bg-blue">
            <input type="radio" name="options" value="2" autocomplete="off" @if($step == 2) checked @endif > 2. Inventario de materiales
        </label>
        <label class="btn btn-sm bg-blue">
            <input type="radio" name="options" value="3" autocomplete="off" @if($step == 3) checked @endif > 3. Informe preliminar
        </label>
        <label class="btn btn-sm bg-blue">
            <input type="radio" name="options" value="4" autocomplete="off" @if($step == 4) checked @endif > 4. Memoria definitiva
        </label>
    </div>
    <div class="mt-3">

    </div>

@endsection


@section('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Livewire.on('reloadPageLi', () => {
            //     window.location.reload();
            // });
        });

        document.addEventListener('DOMContentLoaded', function() {
            $('.btn-group-toggle label input').on('change', function() {
                const step = $(this).val();
                location.href = "{{url(route('projects.steps.show', ['projectId' => $project->id]))}}/" + step;
                // $('#opcionSeleccionada').text($(this).text().trim());
            });
        });

    </script>
@endsection

