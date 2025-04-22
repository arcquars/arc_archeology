@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Proyectos')

@section('content_header')
    <h1>Proyectos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="pName">Nombre proyecto</label>
            <input type="text" class="form-control" id="pName" placeholder="">
        </div>
        <div class="col-md-3 form-group">
            <label for="pAcronym">Acronimo</label>
            <input type="text" class="form-control" id="pAcronym" placeholder="">
        </div>
        <div class="col-md-3 form-group">
            <label for="pDossier"># expediente</label>
            <input type="text" class="form-control" id="pDossier" placeholder="">
        </div>
        <div class="col-md-3 d-flex flex-column justify-content-end">
            <div class="form-group">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-primary">
                    <i class="far fa-plus-square"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Acronimo</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>La alcudia</td>
                <td>IDR 52200</td>
                <td class="text-right">
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="fas fa-user-friends"></i>
                    </a>
                    <a href="#" class="text-danger h5 p-1">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>La alcudia</td>
                <td>IDR 52200</td>
                <td class="text-right">
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="fas fa-user-friends"></i>
                    </a>
                    <a href="#" class="text-danger h5 p-1">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>La alcudia</td>
                <td>IDR 52200</td>
                <td class="text-right">
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="fas fa-user-friends"></i>
                    </a>
                    <a href="#" class="text-danger h5 p-1">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>La alcudia</td>
                <td>IDR 52200</td>
                <td class="text-right">
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="fas fa-user-friends"></i>
                    </a>
                    <a href="#" class="text-danger h5 p-1">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>La alcudia</td>
                <td>IDR 52200</td>
                <td class="text-right">
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="#" class="text-primary h5 p-1">
                        <i class="fas fa-user-friends"></i>
                    </a>
                    <a href="#" class="text-danger h5 p-1">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

