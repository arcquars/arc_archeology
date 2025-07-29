@extends('layouts.arqueologia')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $projectCount }}</h3>

                    <p>Proyectos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-landmark"></i>
                </div>
                <a href="{{ route('projects.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>

                    <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                @can('manager-users')
                <a href="#" class="small-box-footer">
                    Más info <i class="fas fa-arrow-circle-right"></i>
                </a>
                @else
                <a class="small-box-footer">.</a>
                @endcan
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
