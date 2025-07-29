<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    @include('projects.export-pdf.partials._document_style')

</head>
<body>
@include('projects.export-pdf.partials._document_head')
<h5 class="h-seccion">IDENTIFICACIÓN</h5>
<table class="table-input">
    <tbody>
    <tr>
        <td style="width: 17% !important;">
            <label class="label-5">Fecha</label>
            <p class="p-5">{{ $structureCard->i_date }}</p>
        </td>
        <td style="width: 32% !important;">
            <label class="label-5">Localización en la intervención</label>
            <p class="p-5">{{ $structureCard->i_location_intervention }}</p>
        </td>
        <td style="width: 17% !important;">
            <label class="label-5">Acrónimo</label>
            <p class="p-5">{{ $structureCard->i_acronym }}</p>
        </td>
        <td style="width: 17% !important; vertical-align: top;">
            <label class="label-5">Sector</label>
            <p class="p-5">{{ $structureCard->i_fact }}</p>
        </td>
        <td style="width: 17% !important;">
            <label class="label-5">N. UE</label>
            <p class="p-5">{{ $structureCard->i_n_ue }}</p>
        </td>
    </tr>
    </tbody>
</table>
<table class="table-input">
    <tbody>
    <tr>
        <td style="width: 33.33%; vertical-align: top;">
            <label class="label-5">Datación provisional</label>
            <p class="p-5">{{ $structureCard->i_provisional_dating }}</p>
        </td>
        <td style="width: 33.33%; vertical-align: top;">
            <label class="label-5">Fiabilidad estratigráfica</label>
            <p class="p-5">{{ $structureCard->i_stratigraphic_reliability }}</p>
        </td>
        <td style="width: 33.33%; vertical-align: top;">
            <label class="label-5">Tipo</label>
            <p class="p-5">{{ $structureCard->i_type }}</p>
        </td>
    </tr>
    </tbody>
</table>
<table class="table-input-7 table-i-bordered-2" style="margin-bottom: 2px;">
    <tbody>
    <tr>
        <td><p><b> Conservación </b></p></td>
        <td>
            @if(strcmp($structureCard->conservation, 'MUY DEFICIENTE') == 0)
                <p><b>X Muy deficiente</b></p>
            @else
                <p>Muy deficiente</p>
            @endif
        </td>
        <td>
            @if(strcmp($structureCard->conservation, 'DEFICIENTE') == 0)
                <p><b>X Deficiente</b></p>
            @else
                <p>Deficiente</p>
            @endif
        </td>
        <td>
            @if(strcmp($structureCard->conservation, 'ACEPTABLE') == 0)
                <p><b>X Aceptable</b></p>
            @else
                <p>Aceptable</p>
            @endif
        </td>
        <td>
            @if(strcmp($structureCard->conservation, 'SATISFACTORIA') == 0)
                <p><b>X Satisfactoria</b></p>
            @else
                <p>Satisfactoria</p>
            @endif
        </td>
        <td>
            @if(strcmp($structureCard->conservation, 'RETIRAR') == 0)
                <p><b>X Retirar</b></p>
            @else
                <p>Retirar</p>
            @endif
        </td>
        <td>
            @if(strcmp($structureCard->conservation, 'CONSERVAR') == 0)
                <p><b>X Conservar</b></p>
            @else
                <p>Conservar</p>
            @endif
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion">Descripción e interpretación</h5>
<table class="table-input" >
    <tbody>
    <tr>
        <td style="width: 50%;">
            <p class="p-5">{{ $structureCard->interpretation_description }}</p>
        </td>
        <td style="width: 50%;">
            @foreach($structureCard->urlPhotoPublicAttribute() as $url => $pUrl)
{{--                <img src="{{ $url }}" alt="Imagen desde Wasabi" class="imagen-pdf" />--}}
                @if(strcmp($pUrl['type'], 'image') == 0)
                    <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-100" />
                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                    <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-100" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                @else
                    <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-100" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                @endif
            @endforeach
        </td>
    </tr>
    </tbody>
</table>
<table class="table-input-6-1 table-i-bordered-1">
    <tbody>
    <tr>
        <td>
            <label>Aparejo</label>
            <p>{{ $structureCard->di_rigging }}</p>
        </td>
        <td>
            <label>Largo</label>
            <p>{{ $structureCard->di_length }}</p>
        </td>
        <td>
            <label>Anchura</label>
            <p>{{ $structureCard->di_width }}</p>
        </td>
        <td>
            <label>Alto-Grueso</label>
            <p>{{ $structureCard->di_thick_height }}</p>
        </td>
        <td colspan="2">
            <table class="table-input" style="margin: 0; padding: 0">
                <tbody>
                <tr>
                    <td colspan="2">
                        <div style="background: #808080; padding-bottom: 2px; text-align: center">
                            <label style="color: #fff">Orientación en °</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%">
                        <label>1 grado</label>
                        <p>{{ $structureCard->di_orientation_degrees_1 }}</p>
                    </td>
                    <td style="width: 50%">
                        <label>2 grado</label>
                        <p>{{ $structureCard->di_orientation_degrees_2 }}</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<h5 class="h-seccion">
    ESTRATIGRAFÍA
</h5>
<table class="table-input-2">
    <tbody>
    <tr>
        <td>
{{--            <label>Igual a</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_equals }}</p>--}}
            <p><b>Igual a </b> <span>{{ $structureCard->stratigraphy_equals }}</span></p>
        </td>
        <td>
{{--            <label>Equivale</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_equivale }}</p>--}}
            <p><b>Equivale </b> <span>{{ $structureCard->stratigraphy_equivale }}</span></p>
        </td>
    </tr>
    <tr>
        <td>
{{--            <label>Se le apoya</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_support_provided }}</p>--}}
            <p><b>Se le apoya </b> <span>{{ $structureCard->stratigraphy_support_provided }}</span></p>
        </td>
        <td>
{{--            <label>Se apoya en</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_supported_by }}</p>--}}
            <p><b>Se apoya en </b> <span>{{ $structureCard->stratigraphy_supported_by }}</span></p>
        </td>
    </tr>
    <tr>
        <td>
{{--            <label>Cubierto por</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_covered_by }}</p>--}}
            <p><b>Cubierto por </b> <span>{{ $structureCard->stratigraphy_covered_by }}</span></p>
        </td>
        <td>
{{--            <label>Cubre o se superpone a</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_overlaps_or_covers }}</p>--}}
            <p><b>Cubre o se superpone a </b> <span>{{ $structureCard->stratigraphy_overlaps_or_covers }}</span></p>
        </td>
    </tr>
    <tr>
        <td>
{{--            <label>Relleno por</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_filling_by }}</p>--}}
            <p><b>Relleno por </b> <span>{{ $structureCard->stratigraphy_filling_by }}</span></p>
        </td>
        <td>
{{--            <label>Rellena a</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_fill_in }}</p>--}}
            <p><b>Rellena a </b> <span>{{ $structureCard->stratigraphy_fill_in }}</span></p>
        </td>
    </tr>
    <tr>
        <td>
{{--            <label>Cortado por</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_cut_by }}</p>--}}
            <p><b>Cortado por </b> <span>{{ $structureCard->stratigraphy_cut_by }}</span></p>
        </td>
        <td>
{{--            <label>Corta a</label>--}}
{{--            <p>{{ $structureCard->stratigraphy_cut_to }}</p>--}}
            <p><b>Corta a </b> <span>{{ $structureCard->stratigraphy_cut_to }}</span></p>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion">
    CROQUIS Y COTAS
</h5>
<table class="table-input">
    <tbody>
    <tr>
        <td style="width: 70%; display: block;">
            <div style="width: 100%; display: block;">
                @foreach($structureCard->urlSketchPublicAttribute() as $url => $pUrl)
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
        <td style="width: 30%; vertical-align: top;">
            <table style="width: 100%; table-layout: fixed; border-collapse: collapse">
                <tbody>
                <tr>
                    <td colspan="3" style="text-align: center; background: #808080;">
                        <label style="color: #fff; font-size: 12px;">Cotas</label>
                    </td>
                </tr>
                <tr>
                    <td style="width: 10%"></td>
                    <td style="width: 45%; border: solid 1px #808080; text-align: center">
                        <p style="font-size: 11px; margin: 0; padding: 0;"><b>Sup.</b></p>
                    </td>
                    <td style="width: 45%; border: solid 1px #808080; text-align: center">
                        <p style="font-size: 11px; margin: 0; padding: 0;"><b>Inf.</b></p>
                    </td>
                </tr>
                @foreach($structureCard->quotes as $index => $quote)
                <tr style="border: solid 1px #808080">
                    <td style="text-align: center; border: solid 1px #808080">
                        <p class="semar-p"><b>{{ $index+1 }}</b></p>
                    </td>
                    <td style="text-align: right;border: solid 1px #808080">
                        <p class="semar-p">{{ $quote->surface }}</p>
                    </td>
                    <td style="text-align: right;border: solid 1px #808080">
                        <p class="semar-p">{{ $quote->information }}</p>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion" style="font-size: 10px;">
    DIMENSIONES EN CM DE LOS LADRILLOS (DE PARED O PAVIMENTO), TOMAR COMO MÍNIMO 25 EJEMPLOS DE PIEZAS COMPLETAS (si es posible)
</h5>
<?php
$rest = 10 - count($structureCard->bricks);
if($rest < 0){
    $rest =0;
}
?>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 10%;background: #828282;"><label class="label-5">Largo</label></td>
        @foreach($structureCard->bricks as $index => $brick)
            @if($index <= 10)
                <td style="width: 9%; text-align: center;"><p class="p-5">{{$brick->long}}</p></td>
            @endif
        @endforeach
        @for($i=0; $i<$rest; $i++)
            <td style="width: 9%;"></td>
        @endfor
    </tr>
    <tr>
        <td style="background: #828282;"><label class="label-5">Ancho</label></td>
        @foreach($structureCard->bricks as $index => $brick)
            @if($index <= 10)
                <td style="width: 9%; text-align: center;"><p class="p-5">{{$brick->width}}</p></td>
            @endif
        @endforeach
        @for($i=0; $i<$rest; $i++)
            <td style="width: 9%;"></td>
        @endfor
    </tr>
    <tr>
        <td style="background: #828282;"><label class="label-5">Grueso</label></td>
        @foreach($structureCard->bricks as $index => $brick)
            @if($index <= 10)
                <td style="width: 9%; text-align: center;"><p class="p-5">{{$brick->thick}}</p></td>
            @endif
        @endforeach
        @for($i=0; $i<$rest; $i++)
            <td style="width: 9%;"></td>
        @endfor
    </tr>
    </tbody>
</table>


<h5 class="h-seccion">
    Altura de las tapias
</h5>
<?php
$rest2 = 10 - count($structureCard->formWorks);
if($rest2 < 0){
    $rest2 =0;
}
?>
<table class="table-input table-i-bordered-1">
    <tbody>
    <tr>
        <td style="width: 14%; background: #828282;" rowspan="2"><label class="label-5">ESTRUCTURAS ENCOFRADAS</label></td>
        @for($i=0; $i<10; $i++)
            <td style="width: 8.6%; text-align: center"><p class="p-5">{{ $i +1 }}</p></td>
        @endfor
    </tr>
    <tr>
{{--        <td></td>--}}
        @foreach($structureCard->formWorks as $index => $formWork)
            @if($index <= 10)
                <td style="width: 8.6%; text-align: center;"><p class="p-5">{{$formWork->formwork}}</p></td>
            @endif
        @endforeach
        @for($i=0; $i<$rest2; $i++)
            <td style="width: 8.6%;"></td>
        @endfor
    </tr>
    </tbody>
</table>


</body>
</html>




