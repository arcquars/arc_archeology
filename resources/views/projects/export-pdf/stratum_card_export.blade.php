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
            <p class="p-5">{{ $stratumCard->i_date }}</p>
        </td>
        <td style="width: 32% !important;">
            <label class="label-5">Localización en la intervención</label>
            <p class="p-5">{{ $stratumCard->i_location_intervention }}</p>
        </td>
        <td style="width: 17% !important;">
            <label class="label-5">Acrónimo:</label>
            <p class="p-5">{{ $stratumCard->i_acronym }}</p>
        </td>
        <td style="width: 17% !important;">
            <label class="label-5">Sector</label>
            <p class="p-5">{{ $stratumCard->i_fact }}</p>
        </td>
        <td style="width: 17% !important;">
            <label class="label-5">Nº UE</label>
            <p class="p-5">{{ $stratumCard->i_n_ue }}</p>
        </td>
    </tr>
    </tbody>
</table>
<table class="table-input">
    <tbody>
    <tr>
        <td style="width: 33.33%;">
            <label class="label-5">Datación provisional</label>
            <p class="p-5">{{ $stratumCard->i_provisional_dating }}</p>
        </td>
        <td style="width: 33.33%;">
            <label class="label-5">Fiabilidad estratigráfica</label>
            <p class="p-5">{{ $stratumCard->i_stratigraphic_reliability }}</p>
        </td>
        <td style="width: 33.33%;">
            <label class="label-5">Tipo</label>
            <p class="p-5">{{ $stratumCard->i_type }}</p>
        </td>
    </tr>
    </tbody>
</table>
<hr class="d-hr">
<table class="table-input-7" style="margin-bottom: 2px;">
    <tbody>
    <tr>
        <td><p><b> Conservación </b></p></td>
        <td>
            @if(strcmp($stratumCard->conservation, 'MUY DEFICIENTE') == 0)
                <p><b>X Muy deficiente</b></p>
            @else
                <p>Muy deficiente</p>
            @endif
        </td>
        <td>
            @if(strcmp($stratumCard->conservation, 'DEFICIENTE') == 0)
                <p><b>X Deficiente</b></p>
            @else
                <p>Deficiente</p>
            @endif
        </td>
        <td>
            @if(strcmp($stratumCard->conservation, 'ACEPTABLE') == 0)
                <p><b>X Aceptable</b></p>
            @else
                <p>Aceptable</p>
            @endif
        </td>
        <td>
            @if(strcmp($stratumCard->conservation, 'SATISFACTORIA') == 0)
                <p><b>X Satisfactoria</b></p>
            @else
                <p>Satisfactoria</p>
            @endif
        </td>
        <td>
            @if(strcmp($stratumCard->conservation, 'RETIRAR') == 0)
                <p><b>X Retirar</b></p>
            @else
                <p>Retirar</p>
            @endif
        </td>
        <td>
            @if(strcmp($stratumCard->conservation, 'CONSERVAR') == 0)
                <p><b>X Conservar</b></p>
            @else
                <p>Conservar</p>
            @endif
        </td>
    </tr>
    </tbody>
</table>
<hr class="d-hr">
<table class="table-input-25-75">
    <tbody>
    <tr style="margin-bottom: 2px;">
        <td>
            <label>Fracción fina</label>
        </td>
        <td style="text-align: left">
            <p>
                <span style="font-size: 13px;">Porcentaje</span> |
            @if(strcmp($stratumCard->fine_fraction, 'Arena') == 0)
                <b>X Arena</b>
            @else
                Arena
            @endif
            |
            @if(strcmp($stratumCard->fine_fraction, 'Arcilla') == 0)
                <b>X Arcilla</b>
            @else
                Arcilla
            @endif
            |
            @if(strcmp($stratumCard->fine_fraction, 'Arcilla-Arenosa') == 0)
                <b>X Arcilla-Arenosa</b>
            @else
                Arcilla-Arenosa
            @endif
            |
            @if(strcmp($stratumCard->fine_fraction, 'Limo-Arenoso') == 0)
                <b>X Limo-Arenoso</b>
            @else
                Limo-Arenoso
            @endif
            |
            @if(strcmp($stratumCard->fine_fraction, 'Limo-Arcilloso') == 0)
                <b>X Limo-Arcilloso</b>
            @else
                Limo-Arcilloso
            @endif
            |
            @if(strcmp($stratumCard->fine_fraction, 'Limo') == 0)
                <b>X Limo</b>
            @else
                Limo
            @endif
            |
            @if(strcmp($stratumCard->fine_fraction, 'Arcilla-Limosa') == 0)
                <b>X Arcilla-Limosa</b>
            @else
                Arcilla-Limosa
            @endif

            </p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Fracción gruesa</label>
        </td>
        <td style="text-align: left">
            <p>
                <span style="font-size: 13px;">Porcentaje</span> |
            @if(strcmp($stratumCard->coarse_fraction, 'Gravas (2 mm-1 cm) %') == 0)
                <b>X Gravas (2 mm-1 cm) %</b>
            @else
                Gravas (2 mm-1 cm) %
            @endif
            |
            @if(strcmp($stratumCard->coarse_fraction, 'Cantos (1-10 cm) %') == 0)
                <b>X Cantos (1-10 cm) %</b>
            @else
                Cantos (1-10 cm) %
            @endif
            |
            @if(strcmp($stratumCard->coarse_fraction, 'Bloques (>10 cm) %') == 0)
                <b>X Bloques (>10 cm) %</b>
            @else
                Bloques (>10 cm) %
            @endif
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Interpretación</label>
        </td>
        <td>
            <p style="text-align: justify; width: 100%;">
                @if(strcmp($stratumCard->interpretation, 'Natural') == 0)
                    <b>X Natural</b>
                @else
                    Natural
                @endif
                |
                @if(strcmp($stratumCard->interpretation, 'Construcción') == 0)
                    <b>X Construcción</b>
                @else
                    Construcción
                @endif
                |
                @if(strcmp($stratumCard->interpretation, 'Ocupación') == 0)
                    <b>X Ocupación</b>
                @else
                    Ocupación
                @endif
                |
                @if(strcmp($stratumCard->interpretation, 'Destrucción') == 0)
                    <b>X Destrucción</b>
                @else
                    Destrucción
                @endif
            </p>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion" style="margin-bottom: 2px;">DESCRIPCIÓN E INTERPRETACIÓN</h5>
<table class="table-input">
    <tr>
        <td style="width: 50%; vertical-align: top;">
            <div class="d-textarea">
                <p>{{ $stratumCard->interpretation_description }}</p>
            </div>
        </td>
        <td style="width: 50%; text-align: right">
            @foreach($stratumCard->urlInterpretacionFilePublicAttribute() as $url => $pUrl)
                @if(strcmp($pUrl['type'], 'image') == 0)
                    <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                    <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                @else
                    <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                @endif
            @endforeach
        </td>
    </tr>
</table>

<h5 class="h-seccion">
    COMPOSICIÓN
</h5>
<table class="table-input">
    <tbody>
    <tr>
        <td style="width: 40%;">
            <label class="label-5">ORGÁNICA</label>
            <p style="font-size: 10px; padding: 0; margin: 2px 4px;">
                @if(strcmp($stratumCard->organic_composition, 'Ceniza') == 0)
                    <b>X Ceniza</b>
                @else
                        Ceniza
                @endif
                |
                @if(strcmp($stratumCard->organic_composition, 'Carbones') == 0)
                    <b>X Carbones</b>
                @else
                        Carbones
                @endif
                |
                @if(strcmp($stratumCard->organic_composition, 'Hueso') == 0)
                    <b>X Hueso</b>
                @else
                        Hueso
                @endif
                |
                @if(strcmp($stratumCard->organic_composition, 'Malacof') == 0)
                    <b>X Malacof</b>
                @else
                    Malacof
                @endif
                |
                @if(strcmp($stratumCard->organic_composition, 'Madera') == 0)
                    <b>X Madera</b>
                @else
                        Madera
                @endif
            </p>
        </td>
        <td style="width: 60%;">
            <label class="label-5">INORGÁNICA</label>
            <p style="font-size: 10px; padding: 0; margin: 2px 4px;">
                @if(strcmp($stratumCard->inorganic_composition, 'Ladrillo') == 0)
                    <b>X Ladrillo</b>
                @else
                    Ladrillo
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Escoria') == 0)
                    <b>X Escoria</b>
                @else
                        Escoria
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Enlucido') == 0)
                    <b>X Enlucido</b>
                @else
                    Enlucido
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Mortero') == 0)
                    <b>X Mortero</b>
                @else
                    Mortero
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Cal') == 0)
                    <b>X Cal</b>
                @else
                    Cal
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Piedra trabajada') == 0)
                    <b>X Piedra trabajada</b>
                @else
                    Piedra trabajada
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Tejas') == 0)
                    <b>X Tejas</b>
                @else
                    Tejas
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Adobes') == 0)
                    <b>X Adobes</b>
                @else
                    Adobes
                @endif
                |
                @if(strcmp($stratumCard->inorganic_composition, 'Plástico') == 0)
                    <b>X Plástico</b>
                @else
                    Plástico
                @endif
            </p>
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
            <p>{{ $stratumCard->stratigraphy_equals }}</p>
        </td>
        <td>
            <label>Equivale</label>
            <p>{{ $stratumCard->stratigraphy_equivale }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Se le apoya</label>
            <p>{{ $stratumCard->stratigraphy_support_provided }}</p>
        </td>
        <td>
            <label>Se apoya en</label>
            <p>{{ $stratumCard->stratigraphy_supported_by }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Cubierto por</label>
            <p>{{ $stratumCard->stratigraphy_covered_by }}</p>
        </td>
        <td>
            <label>Cubre o se superpone a</label>
            <p>{{ $stratumCard->stratigraphy_overlaps_or_covers }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Relleno por</label>
            <p>{{ $stratumCard->stratigraphy_filling_by }}</p>
        </td>
        <td>
            <label>Rellena a</label>
            <p>{{ $stratumCard->stratigraphy_fill_in }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <label>Cortado por</label>
            <p>{{ $stratumCard->stratigraphy_cut_by }}</p>
        </td>
        <td>
            <label>Corta a</label>
            <p>{{ $stratumCard->stratigraphy_cut_to }}</p>
        </td>
    </tr>
    </tbody>
</table>
<h5 class="h-seccion">
    COTAS
</h5>
<table class="table-input">
    <tbody>
    <tr>
        <td style="width: 60%;">
            @foreach($stratumCard->urlCroquisPublicAttribute() as $url => $pUrl)
                @if(strcmp($pUrl['type'], 'image') == 0)
                    <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                @elseif(strcmp($pUrl['type'], 'pdf') == 0)
                    <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                @else
                    <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-proporcional-150" />
                    <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
                @endif
            @endforeach
        </td>
        <td style="width: 40%; vertical-align: top;">
            <table class="table-input" style="border: 1px solid black;">
                <tbody>
                <tr style="border: 1px solid black;">
                    <td style="width: 20%; border: 1px solid black;"></td>
                    <td style="width: 40%; border: 1px solid black;"><label class="label-5">Sup.</label></td>
                    <td style="width: 40%; border: 1px solid black;"><label class="label-5">Inf.</label></td>
                </tr>
                @foreach($stratumCard->quotes as $index => $cota)
                <tr style="border: 1px solid black;">

                    <td style="text-align: center; border: 1px solid black;"><p class="p-5">{{$index}}</p></td>
                    <td style="border: 1px solid black;"><p class="p-5">{{$cota->surface }}</p></td>
                    <td style="border: 1px solid black;"><p class="p-5">{{$cota->information }}</p></td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<hr class="d-hr">
<div class="d-textarea">
    <label>Comentario</label>
    <p>{{ $stratumCard->comment }}</p>
</div>

<table class="table-input-25-75">
    <tbody>
    <tr>
        <td>
            <label>Volumen de material</label>
        </td>
        <td style="text-align: left">
        <p>
            @if(strcmp($stratumCard->volume_material, 'Nada') == 0)
                <b>X Nada</b>
            @else
                Nada
            @endif
            |
            @if(strcmp($stratumCard->volume_material, 'Muy escaso (menos de una bolsa pequeña)') == 0)
                <b>X Muy escaso (menos de una bolsa pequeña)</b>
            @else
                Muy escaso (menos de una bolsa pequeña)
            @endif
            |
            @if(strcmp($stratumCard->volume_material, 'Muy escaso (una bolsa pequeña)') == 0)
                <b>X Muy escaso (una bolsa pequeña)</b>
            @else
                Muy escaso (una bolsa pequeña)
            @endif
            |
            @if(strcmp($stratumCard->volume_material, 'Normal (una bolsa grande)') == 0)
                <b>X Normal (una bolsa grande)</b>
            @else
                Normal (una bolsa grande)
            @endif
            |
            @if(strcmp($stratumCard->volume_material, 'Abundante') == 0)
                <b>X Abundante</b>
            @else
                Abundante
            @endif
            |
            @if(strcmp($stratumCard->volume_material, 'Muy abundante (una o más cajas de plástico)') == 0)
                <b>X Muy abundante (una o más cajas de plástico)</b>
            @else
                Muy abundante (una o más cajas de plástico)
            @endif
        </p>
        </td>
    </tr>
    </tbody>
</table>

<h5 class="h-seccion">MATERIALES</h5>
<table class="table-input-3">
    <thead>
    <tr>
        <th>
            <label>Romano Republicano</label>
        </th>
        <th style="text-align: center;">
            <label>Islámico</label>
        </th>
        <th style="text-align: center;">
            <label>Contemporáneo</label>
        </th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>1. Ibérica</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_iberico, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_iberico, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_iberico, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p> 2. Campaniense A </p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_campaniense_a, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_campaniense_a, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_campaniense_a, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p> 3. Campaniense B (Cales) </p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_campaniense_b, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_campaniense_b, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_campaniense_b, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p> 4. Beoboide </p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_beoboide, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_beoboide, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_beoboide, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p> 5. Barniz Negro (Genérico) </p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_barniz_negro_g, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_barniz_negro_g, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_barniz_negro_g, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p> 6. Lucernas </p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_lucernas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_lucernas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_lucernas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>7. Paredes Finas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_paredes_finas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_paredes_finas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_paredes_finas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>8. Ánfora Itálica</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_anfora_italica, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_anfora_italica, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_anfora_italica, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>9. Ánforas (Genéricas)</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_anforas_genericas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_anforas_genericas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_anforas_genericas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>10. Cerámica Gris</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_gris, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_gris, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_gris, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>11. Cerámica de Cocina (Genéricas)</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_cocina_g, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_cocina_g, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_cocina_g, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>12. Cerámica Común Africana</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_comun_a, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_comun_a, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_comun_a, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>13. Cerámica Común Mesa</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_comun_m, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_comun_m, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_romano_ceramica_comun_m, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>37. Verde y Manganeso</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_verde_manganeso, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_verde_manganeso, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_verde_manganeso, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>38. Cuerda Seca Total</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_cuerda_seca_total, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_cuerda_seca_total, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_cuerda_seca_total, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>39. Cerámica Dorada</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_dorada, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_dorada, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_dorada, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>40. Bícromas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_bicromas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_bicromas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_bicromas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>41. Cuerda Seca Parcial</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_cuerda_seca_parcial, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_cuerda_seca_parcial, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_cuerda_seca_parcial, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>42. Esgrafiada</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_esgrafiada, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_esgrafiada, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_esgrafiada, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>43. Monócromas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_monocromas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_monocromas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_monocromas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>44. Cerámica Común</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_comun, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_comun, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_comun, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>45. Cerámica de Cocina</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_cocina, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_cocina, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_ceramica_cocina, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>46. Candiles</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_candiles, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_candiles, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_candiles, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>47. Cántaros y Tinajas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_cantaros_tinajas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_cantaros_tinajas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_cantaros_tinajas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>48. Arcaduces</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_arcaduces, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_arcaduces, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_arcaduces, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>49. Azulejos y Alicatados</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_islamico_azulejos_alicatados, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_azulejos_alicatados, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_islamico_azulejos_alicatados, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>68. Pisa</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_contem_pisa, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_pisa, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_pisa, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>69. Porcelana</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_contem_porcelana, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_porcelana, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_porcelana, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>70. Cerámica de Cocina</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_contem_ceramica_cocina, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_ceramica_cocina, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_ceramica_cocina, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>71. Cerámica Común (Genérica)</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_contem_ceramica_comun_g, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_ceramica_comun_g, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_ceramica_comun_g, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>72. Azulejos (Genérico)</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_contem_azulejos_g, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_azulejos_g, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_azulejos_g, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>73. Pavimento Hidráulico</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->material_contem_pavimento_hidra, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_pavimento_hidra, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->material_contem_pavimento_hidra, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>




<h5 class="h-seccion">RECUPERADOS</h5>
<table class="table-input-3">
    <thead>
    <tr>
        <th>
            <label>Romano Imperial</label>
        </th>
        <th style="text-align: center;">
            <label>Bajomedieval</label>
        </th>
        <th style="text-align: center;">
            <label>Otros Materiales</label>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>14. Terra Sigilata Aretina</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sa, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sa, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sa, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>15. Terra Sigilata Sudgálica</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_ss, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_ss, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_ss, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>16. Terra Sigilata Hispánica</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sh, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sh, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sh, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>17. Terra Sigilata Clara A</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sca, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sca, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_sca, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>18. Terra Sigilata Clara B</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_scb, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_scb, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_terra_scb, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>19. Lucernas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_lucernas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_lucernas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_lucernas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>20. Paredes Finas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_paredes_finas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_paredes_finas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_paredes_finas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>21. Ánfora Hispánica</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_hispanica, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_hispanica, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_hispanica, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>22. Ánfora Africana</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_africana, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_africana, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_africana, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>23. Ánforas Genéricas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_genericas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_genericas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_anfora_genericas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>24. Cerámica Cocina</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_cocina, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_cocina, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_cocina, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>25. Cerámica Común Africana</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_comun_afr, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_comun_afr, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_comun_afr, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>26. Cerámica Común Mesa (Genérica)</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_comun_mesa_g, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_comun_mesa_g, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_romano_i_ceramica_comun_mesa_g, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>50. Cerámica Gris</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_gris, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_gris, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_gris, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>51. Verde y Manganeso</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_verde_manganeso, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_verde_manganeso, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_verde_manganeso, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>52. Cerámica Azul</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_azul, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_azul, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_azul, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>53. Cerámica Dorada</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_dorada, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_dorada, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_dorada, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>54. Azul y Dorada</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_azul_dorada, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_azul_dorada, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_azul_dorada, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>55. Monócroma</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_monocroma, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_monocroma, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_monocroma, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>56. Cerámica Común (Genérica)</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_comun_g, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_comun_g, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_comun_g, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>57. Cerámica de Cocina</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_cocina, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_cocina, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_ceramica_cocina, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>58. Candiles</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_candiles, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_candiles, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_candiles, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>59. Cántaros y Tinajas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_cantaros_tinajas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_cantaros_tinajas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_cantaros_tinajas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>60. Arcaduces</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_arcaduces, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_arcaduces, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_arcaduces, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>61. Azulejos y Alicatados</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_azulejos_alicatados, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_azulejos_alicatados, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_bajomedieval_azulejos_alicatados, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>74. Vidrio</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_vidrio, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_vidrio, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_vidrio, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>75. Hueso Trabajado</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_hueso_trabajado, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_hueso_trabajado, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_hueso_trabajado, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>76. Material de Construcción</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_material_const, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_material_const, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_material_const, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>77. Pinturas Murales</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_pinturas_murales, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_pinturas_murales, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_pinturas_murales, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>78. Yeserías</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_yeserias, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_yeserias, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_yeserias, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>79. Metales</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_metales, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_metales, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_metales, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>80. Monedas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_monedas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_monedas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_monedas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>81. Conducciones Hidráulicas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_conducciones_hidra, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_conducciones_hidra, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_conducciones_hidra, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>82. Piedra Trabajada</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->recovered_om_piedra_trabajada, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_piedra_trabajada, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->recovered_om_piedra_trabajada, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>




<h5 class="h-seccion">ESTRATO</h5>
<table class="table-input-3">
    <thead>
    <tr>
        <th>
            <label>Romano Tardío</label>
        </th>
        <th style="text-align: center;">
            <label>Moderno</label>
        </th>
        <th style="text-align: center;">
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>27. Sigilata Clara b</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_sigilata_clara_b, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_sigilata_clara_b, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_sigilata_clara_b, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>28. Sigilata Clara C</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_sigilata_clara_c, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_sigilata_clara_c, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_sigilata_clara_c, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>29. Derivada Sigilata Paleocristiana</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_derivada_sigilata_p, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_derivada_sigilata_p, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_derivada_sigilata_p, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>30. Otras cerámicas Finas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_otras_ceramicas_f, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_otras_ceramicas_f, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_otras_ceramicas_f, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>31. Lucernas</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_lucernas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_lucernas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_lucernas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>32. Ánfora Africana</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_africana, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_africana, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_africana, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>33. Ánfora Oriental</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_oriental, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_oriental, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_oriental, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>34. Ánforas (Genéricas)</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_genericas, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_genericas, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_anfora_genericas, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>35. Cerámica Cocina Africana</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_ceramica_cocina_a, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_ceramica_cocina_a, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_ceramica_cocina_a, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>36. Cerámica Común Importada</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_romano_t_ceramica_comun_imp, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_ceramica_comun_imp, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_romano_t_ceramica_comun_imp, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table style="width: 100%;" class="table-tr-td-p">
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>62. Cerámica Azul</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_azul, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_azul, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_azul, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>63. Cerámica Dorada</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_dorada, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_dorada, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_dorada, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>64. Cerámica de Alcora</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_alcora, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_alcora, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_alcora, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>65. Cerámica de Cocina</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_cocina, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_cocina, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_cocina, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>66. Cerámica Común</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_comun, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_comun, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_ceramica_comun, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 70%; text-align: left;">
                        <p>67. Azulejos y Alicatados</p>
                    </td>
                    <td style="width: 30%; text-align: right">
                        <p>
                            @if(strcmp($stratumCard->meta->stratum_modern_azulejos_alica, '1') != 0) 1 @else <b>X 1</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_azulejos_alica, '2') != 0) 2 @else <b>X 2</b> @endif
                            |
                            @if(strcmp($stratumCard->meta->stratum_modern_azulejos_alica, '3') != 0) 3 @else <b>X 3</b> @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td>
        </td>
    </tr>
    </tbody>
</table>

<hr class="d-hr">
<div class="d-textarea">
    <label>Descripción</label>
    <p>{{ $stratumCard->description }}</p>
</div>

<h5 class="h-seccion">FOTOGRAFÍAS</h5>
@foreach($stratumCard->urlPhotosPublicAttribute() as $url => $pUrl)
{{--    <img src="{{ $photo }}" class="imagen-pdf" alt="">--}}
    @if(strcmp($pUrl['type'], 'image') == 0)
        <img src="{{ $pUrl['url'] }}" alt="Imagen desde Wasabi" class="imagen-pdf" />
    @elseif(strcmp($pUrl['type'], 'pdf') == 0)
        <img src="{{ public_path('img/generate-pdf.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-pdf" />
        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
    @else
        <img src="{{ public_path('img/generate-unknown.jpeg') }}" alt="Imagen desde Wasabi" class="imagen-pdf" />
        <a href="{{ $pUrl['url'] }}" target="_blank" style="font-size: 10px;">Descargar</a>
    @endif
@endforeach

</body>
</html>




