@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - UEs Crear')

@section('content_header')
    <h1>{{ $project->name }}</h1>
@stop

@section('content')
    <div class="border-bottom border-primary thick-border mb-2">
        <h5 class="text-primary">Identificación</h5>
    </div>
    <div class="row">
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueDate">Fecha</label>
            <input type="date" id="ueDate" name="date" class="form-control form-control-sm">
        </div>
        <div class="col-md-3 form-group form-group-sm">
            <label for="uePlanta">Planta</label>
            <input type="text" id="uePlanta" name="planta" class="form-control form-control-sm">
        </div>
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueStay">Estancia</label>
            <input type="text" id="ueStay" name="stay" class="form-control form-control-sm">
        </div>
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueQuadrant">Cuadrante/Pared</label>
            <input type="text" id="ueQuadrant" name="quadrant" class="form-control form-control-sm">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueAcronym">Acrónimo</label>
            <input type="text" id="ueAcronym" name="acronym" class="form-control form-control-sm">
        </div>
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueFact">Hecho</label>
            <input type="text" id="ueFact" name="Fact" class="form-control form-control-sm">
        </div>
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueNue">N° UE</label>
            <input type="text" id="ueNue" name="number_ue" class="form-control form-control-sm">
        </div>
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueProvisionalDating">Datación provisional</label>
            <input type="text" id="ueProvisionalDating" name="provisional_dating" class="form-control form-control-sm">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueStratigraphicReliability">Fiabilidad estratigrafía</label>
            <input type="text" id="ueStratigraphicReliability" name="stratigraphic_reliability" class="form-control form-control-sm">
        </div>
        <div class="col-md-3 form-group form-group-sm">
            <label for="ueType">Tipo</label>
            <input type="text" id="ueType" name="type" class="form-control form-control-sm">
        </div>
    </div>
@endsection


@section('js')
    <script>

    </script>
@endsection
