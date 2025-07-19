@extends('layouts.arqueologia')

@section('title', 'Perfil de Usuario')

@section('content_header')
    <h1 class="mb-4">Perfil de Usuario</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- Tarjeta de perfil --}}
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        Información del Usuario
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4 font-weight-bold">Nombre:</div>
                            <div class="col-sm-8">{{ $user->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 font-weight-bold">Email:</div>
                            <div class="col-sm-8">{{ $user->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 font-weight-bold">Fecha de creación:</div>
                            <div class="col-sm-8">{{ $user->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Roles:</div>
                            <div class="col-sm-8">
                                @forelse ($user->getRoleNames() as $role)
                                    <span class="badge badge-info">{{ $role }}</span>
                                @empty
                                    <span class="text-muted">Sin roles asignados</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Opcional: botón para editar perfil --}}
                <div class="mt-3 text-right">
{{--                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">--}}
{{--                        Editar Perfil--}}
{{--                    </a>--}}
                </div>

            </div>
        </div>
    </div>
@endsection
