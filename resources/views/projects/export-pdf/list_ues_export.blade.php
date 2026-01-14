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
    <thead>
    <tr>
        <th style="width: 5%;">
            <label class="label-5">UE</label>
        </th>
        {{-- <th style="width: 40%;">
            <label class="label-5">Descripción</label>
        </th> --}}
        <th style="width: 50%;">
            <label class="label-5">Interpretación</label>
        </th>
        <th style="width: 15%;">
            <label class="label-5">Cubierto por</label>
        </th>
        <th style="width: 15%;">
            <label class="label-5">Cubre a</label>
        </th>
        <th style="width: 15%;">
            <label class="label-5">Cronología</label>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($allTicket as $ticket)
    <tr>
        <td>
            <p class="p-5">{{ $ticket->ue }}</p>
        </td>
        {{-- <td>
            <p class="p-5">{{ $ticket->description }}</p>
        </td> --}}
        <td>
            <p class="p-5">{{ $ticket->interpretation }}</p>
        </td>
        <td>
            <p class="p-5">{{ $ticket->covered_by }}</p>
        </td>
        <td>
            <p class="p-5">{{ $ticket->covers_to }}</p>
        </td>
        <td>
            <p class="p-5">{{ $ticket->cronologia }}</p>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>




