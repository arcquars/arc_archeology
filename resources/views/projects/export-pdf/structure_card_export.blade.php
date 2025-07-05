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
<table class="table-input-4">
    <tbody>
    <tr>
        <td>
            <label>Fecha</label>
            <p>{{ $structureCard->msc_date }}</p>
        </td>
        <td>
            <label>Localización en la intervención</label>
            <p>{{ $structureCard->i_location_intervention }}</p>
        </td>
        <td>
            <label>Acrónimo</label>
            <p>{{ $structureCard->i_acronym }}</p>
        </td>
        <td>
            <label>N. UE</label>
            <p>{{ $structureCard->i_n_ue }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Hecho</label>
            <p>{{ $structureCard->i_fact }}</p>
        </td>
        <td>
            <label>Datación provisional</label>
            <p>{{ $structureCard->i_provisional_dating }}</p>
        </td>
        <td>
            <label>Fiabilidad estratigráfica</label>
            <p>{{ $structureCard->i_stratigraphic_reliability }}</p>
        </td>
        <td>
            <label>Tipo</label>
            <p>{{ $structureCard->i_type }}</p>
        </td>
    </tr>
    </tbody>
</table>

<table class="table-input-7" style="margin-bottom: 2px;">
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

<hr class="d-hr">
<div class="d-textarea">
    <label>Descripción e interpretación</label>
    <p>{{ $structureCard->interpretation_description }}</p>
</div>

<hr class="d-hr">
<table class="table-input-6-1">
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
            <table style="width: 100%; margin: 0; padding: 0">
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
            <label>Igual a</label>
            <p>{{ $structureCard->stratigraphy_equals }}</p>
        </td>
        <td>
            <label>Equivale</label>
            <p>{{ $structureCard->stratigraphy_equivale }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Se le apoya</label>
            <p>{{ $structureCard->stratigraphy_support_provided }}</p>
        </td>
        <td>
            <label>Se apoya en</label>
            <p>{{ $structureCard->stratigraphy_supported_by }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Cubierto por</label>
            <p>{{ $structureCard->stratigraphy_covered_by }}</p>
        </td>
        <td>
            <label>Cubre o se superpone a</label>
            <p>{{ $structureCard->stratigraphy_overlaps_or_covers }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Relleno por</label>
            <p>{{ $structureCard->stratigraphy_filling_by }}</p>
        </td>
        <td>
            <label>Rellena a</label>
            <p>{{ $structureCard->stratigraphy_fill_in }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Cortado por</label>
            <p>{{ $structureCard->stratigraphy_cut_by }}</p>
        </td>
        <td>
            <label>Corta a</label>
            <p>{{ $structureCard->stratigraphy_cut_to }}</p>
        </td>
    </tr>
    </tbody>
</table>

<hr class="d-hr">
<h5 class="h-seccion">
    CROQUIS
</h5>
<table style="width: 100%">
    <tbody>
    <tr>
        <td style="width: 60%">

        </td>
        <td style="width: 40%;">
            <table style="width: 100%; table-layout: fixed; border-collapse: collapse">
                <tbody>
                <tr>
                    <td colspan="3" style="text-align: center; background: #808080;">
                        <label style="color: #fff; font-size: 12px;">Cotas</label>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33.33%"></td>
                    <td style="width: 33.33%; border: solid 1px #808080; text-align: center">
                        <p style="font-size: 11px; margin: 0; padding: 0;"><b>Sup.</b></p>
                    </td>
                    <td style="width: 33.33%; border: solid 1px #808080; text-align: center">
                        <p style="font-size: 11px; margin: 0; padding: 0;"><b>Inf.</b></p>
                    </td>
                </tr>
                @foreach($structureCard->quotes as $quote)
                <tr style="border: solid 1px #808080">
                    <td style="text-align: left; border: solid 1px #808080">
                        <p class="semar-p"><b>{{ $quote->id }}</b></p>
                    </td>
                    <td style="text-align: right;border: solid 1px #808080">
                        <p class="semar-p">{{ $quote->surface }}</p>
                    </td>
                    <td>
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

</body>
</html>




