<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        margin-top: 0;
        color: #333;
    }

    @page {
        margin-top: 70px;    /* Espacio reservado para el encabezado en CADA PÁGINA */
        margin-bottom: 60px; /* Espacio reservado para el pie de página (si lo usas) */
        margin-left: 40px;
        margin-right: 40px;
    }

    /* Opcional: Estilos para la numeración de página (si usas footer) */
    .pagenum:before { content: counter(page); }
    .pagecount:before { content: counter(pages); }

    .h-seccion{
        margin: 4px 0 2px 0;
        padding-top: 4px;
        padding-bottom: 4px;
        background: gray;
        text-align: center;
        width: 100%;
        color: #fff;
        font-size: 12px;
    }

    .table-input{
        width: 100%;
        table-layout: fixed; /* ¡Crucial! Las columnas tendrán ancho fijo */
        border-collapse: collapse;
    }

    .table-input-5{
        width: 100%;
        table-layout: fixed; /* ¡Crucial! Las columnas tendrán ancho fijo */
        border-collapse: collapse;
    }

    .label-5{
        font-size: 10px;
        font-weight: 700;
        margin: 4px;
        padding: 0;
        white-space: normal;
    }

    .p-5{
        font-size: 11px;
        margin: 0;
        padding: 4px 6px;
        white-space: normal;
    }

    .table-input-5 thead tr th, .table-input-5 tbody tr td {
        /*border: 1px solid #ccc;*/
        padding: 2px;
        text-align: left;
        overflow: hidden; /* Evita que el contenido se desborde si es demasiado largo */
        white-space: nowrap; /* Mantiene el contenido en una sola línea */
        /*text-overflow: ellipsis; !* Añade puntos suspensivos si el contenido es cortado *!*/
    }

    .table-input-5 tbody tr td{
        width: 20%;
        vertical-align: top;
    }

    .table-input-4{
        width: 100%;
        table-layout: fixed; /* ¡Crucial! Las columnas tendrán ancho fijo */
        border-collapse: collapse;
    }

    .table-input-4 thead tr th, .table-input-4 tbody tr td {
        /*border: 1px solid #ccc;*/
        padding: 2px;
        text-align: left;
        overflow: hidden; /* Evita que el contenido se desborde si es demasiado largo */
        white-space: nowrap; /* Mantiene el contenido en una sola línea */
        /*text-overflow: ellipsis; !* Añade puntos suspensivos si el contenido es cortado *!*/
    }

    .table-input-4 tbody tr td{
        width: 25%;
        vertical-align: top;
    }

    .table-input-2 tbody tr td label, .table-input-4 tbody tr td label, .table-input-25-75 tbody tr td label {
        font-size: 12px;
        font-weight: 700;
        margin: 4px;
        padding: 0;
        white-space: normal;
    }

    .table-input-2 tbody tr td p, .table-input-4 tbody tr td p, .table-input-6 tbody tr td p, .table-input-7 tbody tr td p,
    .table-input-8 tbody tr td p, .table-input-25-75 tbody tr td p{
        font-size: 11px;
        margin: 0;
        padding: 2px 4px;
        white-space: normal;
    }

    .table-input-7{
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    .table-input-7 tbody tr td:first-child{
        width: 20%;
        background: grey;
        color: #fff;
        text-align: left;
    }

    .table-input-7 tbody tr td{
        width: 13.3%;
        vertical-align: top;
        text-align: right;
    }

    .table-input-8{
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    .table-input-8 tbody tr td:first-child{
        width: 20% !important;
        background: grey;
        color: #fff;
        text-align: left;
    }

    .table-input-8 tbody tr td{
        width: 12.5%;
        vertical-align: top;
        text-align: right;
    }

    .table-input-25-75{
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    .table-input-25-75 tbody tr{
        border-bottom: solid 1px #fff;
    }

    .table-input-25-75 tbody tr td{
        width: 75%;
        vertical-align: top;
        text-align: right;
    }

    .table-input-25-75 tbody tr td:first-child{
        width: 25% !important;
        background: grey;
        color: #fff;
        text-align: left;
    }

    .table-input-3 {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    /*.table-input-8 tbody tr td:first-child{*/
    /*    width: 33.33% !important;*/
    /*    background: grey;*/
    /*    color: #fff;*/
    /*    text-align: left;*/
    /*}*/

    .table-input-3 tbody tr td{
        width: 33.33%;
        vertical-align: top;
        text-align: right;
    }

    .table-input-3 thead tr th {
        margin: 2px;
        background: #808080;
        border: solid 1px #fff;
    }

    .table-input-3 thead tr th label{
        font-size: 12px;
        font-weight: 700;
        margin: 0;
        padding: 0;
        color: #fff;
    }

    .table-input-3 tbody tr td p{
        font-size: 11px;
        margin: 0;
        padding: 0;
        /*color: #fff;*/
    }


    .d-textarea{
        width: 100%;
    }

    .d-textarea label {
        font-size: 12px;
        font-weight: 700;
        margin: 0;
        padding: 0;
    }

    .d-textarea p{
        font-size: 11px;
        margin: 0;
        padding: 2px 4px;
        white-space: normal;
        text-align: justify;
    }

    .semar-p {
        font-size: 11px;
        margin: 0;
        padding: 2px 4px;
        white-space: normal;
        /*text-align: justify;*/
    }

    .d-hr{
        /*background: grey;*/
        margin: 4px 0;
        padding: 0;
        border: solid 1px grey;
    }

    .table-input-6{
        width: 100%;
        margin: 2px;
        table-layout: fixed; /* ¡Crucial! Las columnas tendrán ancho fijo */
        border-collapse: collapse;
    }

    .table-input-6 thead tr th, .table-input-6 tbody tr td {
        width: 16.5%;
        padding: 2px;
        overflow: hidden; /* Evita que el contenido se desborde si es demasiado largo */
        white-space: nowrap; /* Mantiene el contenido en una sola línea */
        /*text-overflow: ellipsis; !* Añade puntos suspensivos si el contenido es cortado *!*/
    }

    .table-input-6 tbody tr td{
        vertical-align: top;
        text-align: center;
        border: solid 1px #808080;
    }

    .table-input-6 tbody tr td label{
        font-size: 10px;
        font-weight: 700;
        margin: 0;
        padding: 0;
        white-space: normal;
    }

    .table-input-6-1{
        width: 100%;
        margin: 2px;
        table-layout: fixed; /* ¡Crucial! Las columnas tendrán ancho fijo */
        border-collapse: collapse;
    }

    .table-input-6-1 thead tr th, .table-input-6-1 tbody tr td {
        width: 16.5%;
        padding: 2px;
        overflow: hidden; /* Evita que el contenido se desborde si es demasiado largo */
        white-space: nowrap; /* Mantiene el contenido en una sola línea */
        /*text-overflow: ellipsis; !* Añade puntos suspensivos si el contenido es cortado *!*/
    }

    .table-input-6-1 tbody tr td{
        vertical-align: top;
    }

    .table-input-6-1 tbody tr td label{
        font-size: 10px;
        font-weight: 700;
        margin: 0;
        padding: 0;
        white-space: normal;
    }

    .table-input-6-1 tbody tr td p{
        font-size: 11px;
        margin: 0;
        padding: 2px 4px;
        white-space: normal;
        text-align: justify;
    }
    .d-col-3{
        border-right: solid 1px #808080;
        text-align: center !important;
        background: #808080;
    }
    .d-sub-title{
        color: #fff;
        margin: 0;
        padding: 0;
    }

    .table-input-2{
        width: 100%;
        margin: 2px 2px 0 2px;
        table-layout: fixed; /* ¡Crucial! Las columnas tendrán ancho fijo */
        border-collapse: collapse;
    }

    .table-input-2 thead tr th, .table-input-2 tbody tr td {
        width: 50%;
        padding: 2px;
        overflow: hidden; /* Evita que el contenido se desborde si es demasiado largo */
        white-space: nowrap; /* Mantiene el contenido en una sola línea */
        /*text-overflow: ellipsis; !* Añade puntos suspensivos si el contenido es cortado *!*/
    }

    .table-input-2 tbody tr td{
        vertical-align: top;
        text-align: justify;
        border: solid 1px #808080;
    }

    .cm-control label{
        font-size: 12px;
        font-weight: 700;
        margin: 0;
        padding: 0;
        white-space: normal;
    }

    .cm-control p{
        font-size: 11px;
        margin: 0;
        padding: 2px 4px;
        white-space: normal;
    }

    header {
        position: fixed;
        top: -60px;
        left: 0;
        right: 0;
        height: 60px;
        text-align: center;
        line-height: 20px;
        font-size: 14px;
        border-bottom: 1px solid #000;
    }

    footer {
        position: fixed;
        bottom: -40px;
        left: 0;
        right: 0;
        height: 30px;
        text-align: center;
        font-size: 12px;
        color: #666;
    }

    .page-number:before {
        content: "Página " counter(page);
    }

    .imagen-pdf {
        width: 100%; /* O el tamaño que necesites */
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .imagen-pdf-75 {
        width: 75%; /* O el tamaño que necesites */
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .imagen-proporcional-100{
        max-height: 100px;
        width: auto;
        height: auto;
        display: block;
    }

    .imagen-proporcional-150{
        max-height: 150px;
        width: auto;
        height: auto;
        display: block;
    }

    .imagen-proporcional-250{
        max-height: 250px;
        width: auto;
        height: auto;
        display: block;
    }

    .table-i-bordered-1, .table-i-bordered-1 tbody tr, .table-i-bordered-1 tbody tr td{
        border: 1px solid #838383;
    }

    .table-i-bordered-2, .table-i-bordered-2 tbody tr, .table-i-bordered-2 tbody tr td{
        border: 2px solid #838383;
    }
</style>
