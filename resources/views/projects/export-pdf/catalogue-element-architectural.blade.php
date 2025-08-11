<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    @include('projects.export-pdf.partials._document_style')

</head>
<body>
@include('projects.export-pdf.partials._document_head')
<h5 class="h-seccion">PROCEDE</h5>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td>
            <label class="label-5">Fecha de ingreso</label>
        </td>
        <td colspan="2">
            <p class="p-9">{{ $catalogueArchitectural->proceed_date_admission }}</p>
        </td>
        <td>
            <label class="label-5">Fuente de ingreso</label>
        </td>
        <td>
            <p class="p-9">{{ $catalogueArchitectural->proceed_source_admission }}</p>
        </td>

    </tr>
    <tr>
        <td style="width: 20%">
            <label class="label-5">Acrónimo/UE</label>
        </td>
        <td style="width: 10%">
            <p class="p-9">{{ $catalogueArchitectural->proceed_acronym }}</p>
        </td>
        <td style="width: 10%">
            <p class="p-9">{{ $catalogueArchitectural->proceed_ue }}</p>
        </td>
        <td style="width: 20%">
            <label class="label-5">Procedencia</label>
        </td>
        <td style="width: 40%">
            <p class="p-9">{{ $catalogueArchitectural->proceed_origin }}</p>
        </td>

    </tr>
    </tbody>
</table>
<h5 class="h-seccion">CLASIFICACIÓN</h5>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 20%">
            <label class="label-5">Clasificación</label>
        </td>
        <td style="width: 80%; text-align: center">
            <p class="p-9">{{ $catalogueArchitectural->c_classification }}</p>
        </td>
    </tr>
    <tr>
        <td style="width: 20%">
            <label class="label-5">Nombre Común</label>
        </td>
        <td style="width: 80%; text-align: center">
            <p class="p-9">{{ $catalogueArchitectural->c_common_name }}</p>
        </td>
    </tr>
    <tr>
        <td style="width: 20%">
            <label class="label-5">Nombre Específico</label>
        </td>
        <td style="width: 80%; text-align: center">
            <p class="p-9">{{ $catalogueArchitectural->c_specific_name }}</p>
        </td>
    </tr>
    <tr>
        <td style="width: 20%">
            <label class="label-5">Datación</label>
        </td>
        <td style="width: 80%; text-align: center">
            <p class="p-9">{{ $catalogueArchitectural->c_dating }}</p>
        </td>
    </tr>
    <tr>
        <td style="width: 20%">
            <label class="label-5">Estado integridad</label>
        </td>
        <td style="width: 80%; text-align: center">
            <p class="p-9">{{ $catalogueArchitectural->c_integrity_status }}</p>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion">SIGLAS</h5>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 20%">
            <label class="label-5">Siglas</label>
        </td>
        <td style="width: 30%">
            <p class="p-9">{{ $catalogueArchitectural->a_acronyms }}</p>
        </td>
        <td style="width: 20%">
            <label class="label-5">Ubicación sigla</label>
        </td>
        <td style="width: 30%">
            <p class="p-9">{{ $catalogueArchitectural->a_location }}</p>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion">UBICACIÓN</h5>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td>
            <label class="label-5">Ubicación</label>
        </td>
        <td colspan="4">
            <p class="p-9">{{ $catalogueArchitectural->location }}</p>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top;">
            <label class="label-5">Fecha</label>
        </td>
        <td style="vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->location_date }}</p>
        </td>
        <td style="vertical-align: top;">
            <label class="label-5">Notas</label>
        </td>
        <td colspan="2" style="vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->location_notes }}</p>
        </td>
    </tr>
    <tr>
        <td rowspan="4" style="width: 20%; vertical-align: top;">
            <label class="label-5">Dimensiones</label>
        </td>
        <td style="width: 10%; vertical-align: top;">
            <p class="p-9">Long</p>
        </td>
        <td style="width: 20%; vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->dimension_long }}</p>
        </td>
        <td style="width: 10%; text-align: center; vertical-align: top;">
            <p class="p-9">cm</p>
        </td>
        <td style="width: 40%;">
        </td>
    </tr>
    <tr>
        <td style="width: 10%; vertical-align: top;">
            <p class="p-9">Anch</p>
        </td>
        <td style="width: 20%; vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->dimension_anch }}</p>
        </td>
        <td style="width: 10%; text-align: center; vertical-align: top;">
            <p class="p-9">cm</p>
        </td>
        <td style="width: 40%;">
        </td>
    </tr>
    <tr>
        <td style="width: 10%; vertical-align: top;">
            <p class="p-9">Alt</p>
        </td>
        <td style="width: 20%; vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->dimension_alt }}</p>
        </td>
        <td style="width: 10%; text-align: center; vertical-align: top;">
            <p class="p-9">cm</p>
        </td>
        <td style="width: 40%;">
        </td>
    </tr>
    <tr>
        <td style="width: 10%; vertical-align: top;">
            <p class="p-9">Otras</p>
        </td>
        <td style="width: 20%; vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->dimension_other }}</p>
        </td>
        <td style="width: 10%; text-align: center; vertical-align: top;">
        </td>
        <td style="width: 40%;">
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top;">
            <label class="label-5">Materia</label>
        </td>
        <td colspan="2" style="vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->subject }}</p>
        </td>
        <td style="vertical-align: top;">
            <label class="label-5">Técnica</label>
        </td>
        <td>
            <p class="p-9">{{ $catalogueArchitectural->technique }}</p>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion">DESCRIPCIÓN</h5>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="vertical-align: top;">
            <label class="label-5">Descripción</label>
        </td>
        <td colspan="3" style="vertical-align: top;">
            <p class="p-9">{{ $catalogueArchitectural->description }}</p>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; width: 20%">
            <label class="label-5">Estado conservación</label>
        </td>
        <td style="vertical-align: top; width: 20%;">
            <p class="p-9">{{ $catalogueArchitectural->conservation_status }}</p>
        </td>
        <td rowspan="2" style="vertical-align: top; width: 20%;">
            <label class="label-5">Observaciones</label>
        </td>
        <td rowspan="2" style="vertical-align: top; width: 40%">
            <p class="p-9">{{ $catalogueArchitectural->comments }}</p>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; width: 20%">
            <label class="label-5">Autor</label>
        </td>
        <td style="vertical-align: top; width: 20%;">
            <p class="p-9">{{ $catalogueArchitectural->author }}</p>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion">FOTO</h5>
<?php
$photoChunks = array_chunk($catalogueArchitectural->urlPhotosPublicAttribute(), 3);
?>
<table style="width: 100%;">
    @foreach($photoChunks as $columns)
        <tr>
            @foreach($columns as $url => $pUrl)
                <td style="width: 33.33%; text-align: center;">
                    @if(strcmp($pUrl['type'], 'image') == 0)
                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                        <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                    @else
                        <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
<h5 class="h-seccion">CROQUIS</h5>
<?php
$sketchChunks = array_chunk($catalogueArchitectural->urlSketchPublicAttribute(), 3);
?>
<table style="width: 100%;">
    @foreach($sketchChunks as $columns)
        <tr>
            @foreach($columns as $url => $pUrl)
                <td style="width: 33.33%; text-align: center;">
                    @if(strcmp($pUrl['type'], 'image') == 0)
                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                        <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                    @else
                        <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-125" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</table>

</body>
</html>




