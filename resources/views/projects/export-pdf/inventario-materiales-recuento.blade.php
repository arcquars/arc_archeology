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
            <label class="label-5">Cronología</label>
        </td>
        <td colspan="3">
            <p class="p-9">{{ $material->chronology }}</p>
        </td>
    </tr>
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