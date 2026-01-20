<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    @include('projects.export-pdf.partials._document_style')

</head>
<body>
@include('projects.export-pdf.partials._document_head')
<h5 class="h-seccion">{{ $material->id }} - Material - {{ $material->material_type }}</h5>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td>
            <label class="label-5">UE</label>
        </td>
        <td>
            <p class="p-9">{{ $material->ue }}</p>
        </td>
        <td>
            <label class="label-5">Objeto</label>
        </td>
        <td>
            <p class="p-9">{{ $material->object }}</p>
        </td>
        <td>
            <label class="label-5">Siglo</label>
        </td>
        <td>
            <p class="p-9">{{ $material->century }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label class="label-5">Clase</label>
        </td>
        <td>
            <p class="p-9">{{ $material->class }}</p>
        </td>
        <td>
            <label class="label-5">Fragmentos</label>
        </td>
        <td>
            <p class="p-9">{{ $material->fragments }}</p>
        </td>
        <td>
            <label class="label-5">Forma</label>
        </td>
        <td>
            <p class="p-9">{{ $material->form }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label class="label-5">% de la pieza</label>
        </td>
        <td>
            <p class="p-9">{{ $material->piece_percentage }}</p>
        </td>
        <td>
            <label class="label-5">Grosor</label>
        </td>
        <td>
            <p class="p-9">{{ $material->thickness }}</p>
        </td>
        <td>
            <label class="label-5">Pasta</label>
        </td>
        <td>
            <p class="p-9">{{ $material->pasta }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label class="label-5">Decoración</label>
        </td>
        <td colspan="5">
            <p class="p-9">{{ $material->decoration }}</p>
        </td>
    </tr>
    @if(strcmp($material->material_type, \App\Models\Material::MATERIAL_TYPE_CERAMIC) == 0)
        <tr>
            <td>
                <label class="label-5">Altura</label>
            </td>
            <td>
                <p class="p-9">{{ $material->ceramic->height }}</p>
            </td>
            <td>
                <label class="label-5">Ø base</label>
            </td>
            <td>
                <p class="p-9">{{ $material->ceramic->diameter_base }}</p>
            </td>
            <td>
                <label class="label-5">Ø boca</label>
            </td>
            <td>
                <p class="p-9">{{ $material->ceramic->diameter_mouth }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <label class="label-5">Ø máximo</label>
            </td>
            <td colspan="5">
                <p class="p-9">{{ $material->ceramic->diameter_max }}</p>
            </td>
        </tr>    
        <tr>
            <td>
                <label class="label-5">Descripción</label>
            </td>
            <td colspan="5">
                <p class="p-9">{{ $material->ceramic->description }}</p>
            </td>
        </tr>    
        @elseif(strcmp($material->material_type, \App\Models\Material::MATERIAL_TYPE_TILE) == 0)
        <tr>
            <td>
                <label class="label-5">Lado máximo</label>
            </td>
            <td>
                <p class="p-9">{{ $material->tile->side_max }}</p>
            </td>
            <td>
                <label class="label-5">Lado mínimo</label>
            </td>
            <td colspan="3">
                <p class="p-9">{{ $material->tile->side_min }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <label class="label-5">Notas</label>
            </td>
            <td colspan="5">
                <p class="p-9">{{ $material->tile->notes }}</p>
            </td>
        </tr>
    @endif
    </tbody>
</table>
<h5 class="h-seccion">FOTO</h5>
<?php
$photoChunks = array_chunk($material->urlPhotosPublicAttribute(), 3);
?>
<br>
<table style="width: 100%; margin-top: 2px;">
    @foreach($photoChunks as $columns)
        <tr>
            @foreach($columns as $url => $pUrl)
                <td style="width: 33.33%; text-align: center;">
                    @if(strcmp($pUrl['type'], 'image') == 0)
                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                        <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                        <br>
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                    @else
                        <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                        <br>
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
</body>
</html>