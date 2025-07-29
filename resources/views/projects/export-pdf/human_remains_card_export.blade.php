<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    @include('projects.export-pdf.partials._document_style')

</head>
<body>
@include('projects.export-pdf.partials._document_head')

<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 12%">
            <label class="label-5">INTERVENCIÓN</label>
        </td>
        <td style="width: 70%"><p class="p-5">{{$humanRemainCard->intervention}}</p></td>
        <td style="width: 12%">
            <label class="label-5">UE</label>
        </td>
        <td style="width: 6%">
            <p class="p-5">{{$humanRemainCard->ue}}</p>
        </td>
    </tr>
    <tr>
        <td style="width: 12%">
            <label class="label-5">LOCALIZACIÓN</label>
        </td>
        <td style="width: 70%">
            <p class="p-5">{{$humanRemainCard->location}}</p>
        </td>
        <td style="width: 12%">
            <label class="label-5">SECTOR</label>
        </td>
        <td style="width: 6%">
            <p class="p-5">{{$humanRemainCard->fact}}</p>
        </td>
    </tr>
    </tbody>
</table>
<div style="height: 5px"></div>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td rowspan="2" style="width: 12%;"><label class="label-5">TIPO</label></td>
        <td style="width: 35%;"><p class="p-5">Inhumación</p></td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->type_inhumation) checked @endif>
        </td>
        <td rowspan="2" style="width: 12%;">
            <label class="label-5">ASOCIADO A</label>
        </td>
        <td colspan="2" rowspan="2" style="width: 31%;">
            <p class="p-5">{{$humanRemainCard->associated_with}}</p>
        </td>
    </tr>
    <tr>
        <td><p class="p-5">Cremación</p></td>
        <td style="text-align: center;">
            <input type="checkbox" @if($humanRemainCard->type_cremation) checked @endif>
        </td>
    </tr>
    <tr>
        <td colspan="6">
            <label class="label-5">DESCRIPCIÓN</label>
            <p class="p-5">{{$humanRemainCard->description}}</p>
        </td>
    </tr>
    <tr>
        <td rowspan="3" style="width: 12%;"><label class="label-5">DEPOSICIÓN</label></td>
        <td style="width: 35%;"><p class="p-5">Primaria</p></td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposition_primary) checked @endif>
        </td>
        <td rowspan="3" style="width: 12%;">
            <label class="label-5">CONSERVACIÓN</label>
        </td>
        <td><p class="p-5">Buena</p></td>
        <td style="text-align: center; width: 5%">
            <input type="checkbox" @if($humanRemainCard->conservation_good) checked @endif>
        </td>
    </tr>
    <tr>
        <td><p class="p-5">Secundaria</p></td>
        <td style="text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposition_secondary) checked @endif>
        </td>
        <td><p class="p-5">Alteraciones parciales</p></td>
        <td style="text-align: center;">
            <input type="checkbox" @if($humanRemainCard->conservation_partial_alterations) checked @endif>
        </td>
    </tr>
    <tr>
        <td><p class="p-5">Osario</p></td>
        <td style="text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposition_ossuary) checked @endif>
        </td>
        <td><p class="p-5">Totalmente alterado</p></td>
        <td style="text-align: center;">
            <input type="checkbox" @if($humanRemainCard->conservation_totally_altered) checked @endif>
        </td>
    </tr>
    <tr>
        <td rowspan="2" style="width: 12%;"><label class="label-5">CONTEXTO</label></td>
        <td style="width: 35%;"><p class="p-5">Funerario</p></td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->context_undertaker) checked @endif>
        </td>
        <td rowspan="2" style="width: 12%;">
            <label class="label-5">SEPULTURA</label>
        </td>
        <td><p class="p-5">En fosa individual</p></td>
        <td style="text-align: center; width: 5%">
            <input type="checkbox" @if($humanRemainCard->burial_single_grave) checked @endif>
        </td>
    </tr>
    <tr>
        <td><p class="p-5">Doméstico</p></td>
        <td style="text-align: center;">
            <input type="checkbox" @if($humanRemainCard->context_secondary) checked @endif>
        </td>
        <td><p class="p-5">En fosa colectiva</p></td>
        <td style="text-align: center;">
            <input type="checkbox" @if($humanRemainCard->burial_communal_grave) checked @endif>
        </td>
    </tr>
    </tbody>
</table>
<div style="height: 5px"></div>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td colspan="4"><label class="label-5">RELACIONES</label></td>
    </tr>
    <tr>
        <td style="width: 20%;"><p class="p-5">Igual a</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_equals }}</p></td>
        <td style="width: 20%;"><p class="p-5">Equivale a</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_equivalent_to }}</p></td>
    </tr>
    <tr>
        <td style="width: 20%;"><p class="p-5">Se le adosa</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_attached }}</p></td>
        <td style="width: 20%;"><p class="p-5">Se adosa a</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_attached_to }}</p></td>
    </tr>
    <tr>
        <td style="width: 20%;"><p class="p-5">Cubierto por</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_covered_by }}</p></td>
        <td style="width: 20%;"><p class="p-5">Cubre a</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_covers_to }}</p></td>
    </tr>
    <tr>
        <td style="width: 20%;"><p class="p-5">Relleno por</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_filling_by }}</p></td>
        <td style="width: 20%;"><p class="p-5">Rellena a</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_fill_to }}</p></td>
    </tr>
    <tr>
        <td style="width: 20%;"><p class="p-5">Cortado por</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_cut_by }}</p></td>
        <td style="width: 20%;"><p class="p-5">Corta a</p></td>
        <td style="width: 30%;"><p class="p-5" style="text-align: right;">{{ $humanRemainCard->relationship_cut_to }}</p></td>
    </tr>
    </tbody>
</table>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 50%;"></td>
        <td style="width: 50%;">
            <label class="label-5">PERIODIZACIÓN</label>
            <p class="p-5">{{ $humanRemainCard->periodization }}</p>
        </td>
    </tr>
    </tbody>
</table>
<div style="height: 5px;"></div>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 30%;">
            <label class="label-5">DATACIÓN PROVISIONAL</label>
        </td>
        <td style="width: 70%;">
            <p class="p-5">{{ $humanRemainCard->provisional_dating }}</p>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label class="label-5">INTERPRETACIÓN</label>
            <p class="p-5">{{ $humanRemainCard->interpretation }}</p>
        </td>
    </tr>
    </tbody>
</table>



<div style="height: 5px;"></div>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td colspan="4">
            <label class="label-5">ARCHIVO TOPOGRÁFICO</label>
            <div style="width: 100%; display: block;">
            @foreach($humanRemainCard->urlFileTopographicPublicAttribute() as $url => $pUrl)
{{--                <img src="{{ $topo }}" class="imagen-pdf" alt="" />--}}
                @if(strcmp($pUrl['type'], 'image') == 0)
                    <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250" />
                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                    <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                @else
                    <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                @endif
            @endforeach
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <label class="label-5">ARCHIVO FOTOGRÁFICO</label>
            <div style="width: 100%; display: block;">
            @foreach($humanRemainCard->urlFilePhotographicPublicAttribute() as $url => $pUrl)
{{--                <img src="{{ $photo }}" class="imagen-pdf" alt="" />--}}
                    @if(strcmp($pUrl['type'], 'image') == 0)
                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250" />
                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                        <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                    @else
                        <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-250" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                    @endif
            @endforeach
            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 15%">
            <label class="label-5">FECHAS</label>
        </td>
        <td style="width: 30%">
            <p class="p-5">{{$humanRemainCard->dates}}</p>
        </td>
        <td style="width: 15%">
            <label class="label-5">AUTOR</label>
        </td>
        <td style="width: 40%">
            <p class="p-5">{{$humanRemainCard->author}}</p>
        </td>
    </tr>
    </tbody>
</table>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 50%; vertical-align: top;">
            <label class="label-5">CROQUIS INHUMACIÓN (orientación y posición)</label>
            <div style="width: 100%; display: block;">
            @foreach($humanRemainCard->urlSketchPublicAttribute() as $url => $pUrl)
{{--                <img src="{{ $sketch }}" class="imagen-pdf" alt="" />--}}
                    @if(strcmp($pUrl['type'], 'image') == 0)
                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                        <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                    @else
                        <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                    @endif
            @endforeach
            </div>
        </td>
        <td style="width: 50%; vertical-align: top;">
            <label class="label-5">PARTE CONSERVADA</label>
            <div style="width: 100%; display: block;">
            @foreach($humanRemainCard->urlPreservedPartPublicAttribute() as $url => $pUrl)
{{--                <img src="{{ $preserved }}" class="imagen-pdf" alt="" />--}}
                    @if(strcmp($pUrl['type'], 'image') == 0)
                        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                        <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                    @else
                        <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px; display: block; text-align: center;">Descargar</a>
                    @endif
            @endforeach
            </div>
        </td>
    </tr>
    </tbody>
</table>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 15%; vertical-align: middle;" rowspan="3">
            <label class="label-5">DISPOSICIÓN</label>
        </td>
        <td colspan="2" style="width: 41%;">
            <p class="p-5">Decúbito supino</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->disposition_decubito_supino) checked @endif>
        </td>
        <td style="width: 34%; vertical-align: top;" rowspan="10">
            <label class="label-5">Observaciones antropológicas</label>
            <p class="p-5">
                {{ $humanRemainCard->obs_antropologicas }}
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="width: 41%;">
            <p class="p-5">Decúbito lateral derecho</p>
        </td>
        <td style="width: 5%; text-align: center">
            <input type="checkbox" @if($humanRemainCard->disposition_decubito_lateral_der) checked @endif>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="width: 41%;">
            <p class="p-5">Decúbito lateral izquierdo</p>
        </td>
        <td style="width: 5%; text-align: center">
            <input type="checkbox" @if($humanRemainCard->disposition_decubito_lateral_izq) checked @endif>
        </td>
    </tr>
    <tr>
        <td style="width: 15%; vertical-align: middle;" rowspan="4">
            <label class="label-5">Brazos</label>
        </td>
        <td style="width: 41%;">
            <p class="p-5"><b>Posición</b></p>
        </td>
        <td style="width: 5%; text-align: center">
            <p class="p-5"><b>Izqd.</b></p>
        </td>
        <td style="width: 5%; text-align: center;">
            <p class="p-5"><b>Dch.</b></p>
        </td>
    </tr>
    <tr>
        <td style="width: 41%;">
            <p class="p-5">Extendido a lo largo del cuerpo</p>
        </td>
        <td style="width: 5%; text-align: center">
            <input type="checkbox" @if($humanRemainCard->brazos_ext_largo_cuerpo_izq) checked @endif>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->brazos_ext_largo_cuerpo_der) checked @endif>
        </td>
    </tr>
    <tr>
        <td style="width: 41%;">
            <p class="p-5">Sobre pelvis</p>
        </td>
        <td style="width: 5%; text-align: center">
            <input type="checkbox" @if($humanRemainCard->brazos_sobre_pelvis_izq) checked @endif>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->brazos_sobre_pelvis_der) checked @endif>
        </td>
    </tr>
    <tr>
        <td style="width: 41%;">
            <p class="p-5">Sobre el pecho</p>
        </td>
        <td style="width: 5%; text-align: center">
            <input type="checkbox" @if($humanRemainCard->brazos_sobre_pecho_izq) checked @endif>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->brazos_sobre_pecho_der) checked @endif>
        </td>
    </tr>
    <tr>
        <td style="width: 15%; vertical-align: middle;" rowspan="3">
            <label class="label-5">Piernas</label>
        </td>
        <td style="width: 41%;">
            <p class="p-5">Extendida</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->piernas_ext_izq) checked @endif>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->piernas_ext_der) checked @endif>
        </td>
    </tr>
    <tr>
        <td style="width: 41%;">
            <p class="p-5">Semi-flexionada</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->piernas_semi_flex_izq) checked @endif>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->piernas_semi_flex_der) checked @endif>
        </td>
    </tr>
    <tr>
        <td style="width: 41%;">
            <p class="p-5">Flexionada</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->piernas_flexionada_izq) checked @endif>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->piernas_flexionada_der) checked @endif>
        </td>
    </tr>
    </tbody>
</table>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 15%;" rowspan="3">
            <label class="label-5">DEPÓSITO</label>
        </td>
        <td style="width: 19%;">
            <p class="p-5">Adorno personal</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposito_adorno_per) checked @endif>
        </td>
        <td style="width: 22%;">
            <p class="p-5">Fauna</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposito_fauna) checked @endif>
        </td>
        <td style="width: 34%; vertical-align: top;" rowspan="3">
            <label class="label-5">Especificar</label>
            <p class="p-5">{{ $humanRemainCard->specify }}</p>
        </td>
    </tr>
    <tr>
        <td style="width: 19%;">
            <p class="p-5">Cerámica</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposito_ceramica) checked @endif>
        </td>
        <td style="width: 22%;">
            <p class="p-5">Semillas</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposito_semillas) checked @endif>
        </td>
    </tr>
    <tr>
        <td style="width: 19%;">
            <p class="p-5">Armamento</p>
        </td>
        <td style="width: 5%; text-align: center;">
            <input type="checkbox" @if($humanRemainCard->deposito_armamento) checked @endif>
        </td>
        <td style="width: 22%;">
        </td>
        <td style="width: 5%; text-align: center;">
        </td>
    </tr>
    <tr>
        <td colspan="6">
            <label class="label-5">OBSERVACIONES</label>
            <p class="p-5">{{ $humanRemainCard->observations }}</p>
        </td>
    </tr>
    </tbody>
</table>




</body>
</html>




