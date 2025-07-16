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
            <p>{{ $muralStratigraphy->msc_date }}</p>
        </td>
        <td>
            <label>Planta</label>
            <p>{{ $muralStratigraphy->floor }}</p>
        </td>
        <td>
            <label>Estancia</label>
            <p>{{ $muralStratigraphy->stay }}</p>
        </td>
        <td>
            <label>Cuadrante/Pared</label>
            <p>{{ $muralStratigraphy->quadrant }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Acrónimo</label>
            <p>{{ $muralStratigraphy->acronym }}</p>
        </td>
        <td>
            <label>Hecho</label>
            <p>{{ $muralStratigraphy->fact }}</p>
        </td>
        <td>
            <label>No UE</label>
            <p>{{ $muralStratigraphy->n_ue }}</p>
        </td>
        <td>
            <label>Datación provisional</label>
            <p>{{ $muralStratigraphy->provisional_dating }}</p>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label>Fiabilidad estratigráfica:</label>
            <p>{{ $muralStratigraphy->stratigraphic_reliability }}</p>
        </td>
        <td colspan="2">
            <label>Tipo</label>
            <p>{{ $muralStratigraphy->identification_type }}</p>
        </td>
    </tr>
    </tbody>
</table>
<hr class="d-hr">
<table class="table-input-7">
    <tbody>
    <tr>
        <td><p><b>CONSERVACIÓN</b></p></td>
        <td>
            @if(strcmp($muralStratigraphy->preservation, 'MUY DEFICIENTE') == 0)
                <p><b>X Muy deficiente</b></p>
            @else
                <p>Muy deficiente</p>
            @endif
        </td>
        <td>
            @if(strcmp($muralStratigraphy->preservation, 'DEFICIENTE') == 0)
                <p><b>X Deficiente</b></p>
            @else
                <p>Deficiente</p>
            @endif
        </td>
        <td>
            @if(strcmp($muralStratigraphy->preservation, 'ACEPTABLE') == 0)
                <p><b>X Aceptable</b></p>
            @else
                <p>Aceptable</p>
            @endif
        </td>
        <td>
            @if(strcmp($muralStratigraphy->preservation, 'SATISFACTORIA') == 0)
                <p><b>X Satisfactoria</b></p>
            @else
                <p>Satisfactoria</p>
            @endif
        </td>
        <td>
            @if(strcmp($muralStratigraphy->preservation, 'RETIRAR') == 0)
                <p><b>X Retirar</b></p>
            @else
                <p>Retirar</p>
            @endif
        </td>
        <td>
            @if(strcmp($muralStratigraphy->preservation, 'CONSERVAR') == 0)
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
    <label>DESCRIPCIÓN E INTERPRETACIÓN</label>
    <p>{{ $muralStratigraphy->description }}</p>
</div>

<h5 class="h-seccion">COMPONENTES</h5>
<table class="table-input-6">
    <tbody>
    <tr>
        <td colspan="3" class="d-col-3">
            <label class="d-sub-title">PIEDRA</label>
        </td>
        <td colspan="3" class="d-col-3">
            <label class="d-sub-title">LADRILLO</label>
        </td>
    </tr>
    <tr>
        <td>
            <label>TIPO</label>
            <p>{{ $muralStratigraphy->component_stone_type }}</p>
        </td>
        <td>
            <label>CARACTERÍSTICAS</label>
            <p>{{ $muralStratigraphy->component_stone_characteristics }}</p>
        </td>
        <td style="border-right: solid 1px #808080">
            <label>TALLA/TRABAJO</label>
            <p>{{ $muralStratigraphy->component_stone_size }}</p>
        </td>
        <td>
            <label>TIPO</label>
            <p>{{ $muralStratigraphy->component_brick_type }}</p>
        </td>
        <td>
            <label>CARACTERÍSTICAS</label>
            <p>{{ $muralStratigraphy->component_brick_characteristics }}</p>
        </td>
        <td>
            <label>MEDIDAS</label>
            <p>{{ $muralStratigraphy->component_brick_measures }}</p>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="d-col-3">
            <label class="d-sub-title">AGLUTINANTE</label>
        </td>
        <td colspan="3" class="d-col-3">
            <label class="d-sub-title">TAPIAL</label>
        </td>
    </tr>
    <tr>
        <td>
            <label>TIPO</label>
            <p>{{ $muralStratigraphy->component_binder_type }}</p>
        </td>
        <td>
            <label>CARACTERÍSTICAS</label>
            <p>{{ $muralStratigraphy->component_binder_characteristics }}</p>
        </td>
        <td style="border-right: solid 1px #808080">
            <label>JUNTAS</label>
            <p>{{ $muralStratigraphy->component_binder_joints }}</p>
        </td>
        <td>
            <label>CAJA</label>
            <p>{{ $muralStratigraphy->component_tapial_box }}</p>
        </td>
        <td colspan="2">
            <label>ALTURA DE LOS TABLONES</label>
            <p>{{ $muralStratigraphy->component_tapial_height }}</p>
        </td>
    </tr>
    </tbody>
</table>

<h5 class="h-seccion">ESTRATIGRAFÍA</h5>
<table class="table-input-2">
    <tbody>
    <tr>
        <td>
            <label>Igual a</label>
            <p>{{ $muralStratigraphy->stratigraphy_equals_to }}</p>
        </td>
        <td>
            <label>Equivale</label>
            <p>{{ $muralStratigraphy->stratigraphy_equivalent }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Se le apoya</label>
            <p>{{ $muralStratigraphy->stratigraphy_it_is_supported }}</p>
        </td>
        <td>
            <label>Se apoya en</label>
            <p>{{ $muralStratigraphy->stratigraphy_rests_on }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Cubierto por</label>
            <p>{{ $muralStratigraphy->stratigraphy_covered_by }}</p>
        </td>
        <td>
            <label>Cubre o se superpone a</label>
            <p>{{ $muralStratigraphy->stratigraphy_covers_to }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Relleno por</label>
            <p>{{ $muralStratigraphy->stratigraphy_filled_by }}</p>
        </td>
        <td>
            <label>Rellena a</label>
            <p>{{ $muralStratigraphy->stratigraphy_fills_to }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Cortado por</label>
            <p>{{ $muralStratigraphy->stratigraphy_cut_by }}</p>
        </td>
        <td>
            <label>Corta a</label>
            <p>{{ $muralStratigraphy->stratigraphy_cut_to }}</p>
        </td>
    </tr>

    </tbody>
</table>

<table class="table-input">
    <tbody>
    <tr>
        <td style="width: 60%; vertical-align: top;">
            <h5 class="h-seccion">CROQUIS</h5>
            @foreach($muralStratigraphy->urlCroquisPublicAttribute() as $croquis)
                <img src="{{ $croquis }}" class="imagen-pdf" alt="">

            @endforeach
        </td>
        <td style="width: 40%; vertical-align: top;">
            <h5 class="h-seccion">FOTOGRAFÍAS</h5>
            @foreach($muralStratigraphy->urlPhotosPublicAttribute() as $photo)
                <img src="{{ $photo }}" class="imagen-pdf" alt="" style="margin-bottom: 2px;">
            @endforeach
        </td>
    </tr>
    </tbody>
</table>

<table class="table-input-6">
    <tbody>
    <tr>
        <td colspan="4">
            <div class="d-textarea">
                <label>Comentario</label>
                <p>{{ $muralStratigraphy->comments }}</p>
            </div>
        </td>
        <td>
            <label>N. de plano</label>
            <p>{{ $muralStratigraphy->num_flat }}</p>
        </td>
        <td>
            <label>N. Fotografia</label>
            <p>{{ $muralStratigraphy->num_photography }}</p>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>




