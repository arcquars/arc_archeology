<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
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
    <label class="btn btn-sm bg-blue">
        <input type="radio" name="options" value="5" autocomplete="off" @if($step == 5) checked @endif > 5. Comentarios
    </label>
    <label class="btn btn-sm bg-blue">
        <input type="radio" name="options" value="6" autocomplete="off" @if($step == 6) checked @endif > 6. Repositorio de imágenes
    </label>
</div>
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.btn-group-toggle label input').on('change', function() {
                const step = $(this).val();
                location.href = "{{url(route('projects.steps.show', ['projectId' => $project->id]))}}/" + step;
                // $('#opcionSeleccionada').text($(this).text().trim());
            });
        });
    </script>
@endsection
