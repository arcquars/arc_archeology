@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Usuarios')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content-aque')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Contraseña: (Dejar en blanco para no cambiar)</strong>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Confirmar Contraseña:</strong>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <div class="form-group">
                    <strong>Rol:</strong>
                    <select name="role" class="form-control">
                        <option value="">Seleccionar Rol</option>
                        @foreach($roles as $roleName => $roleLabel)
                            <option value="{{ $roleName }}" {{ old('role', $userRole) == $roleName ? 'selected' : '' }}>
                                {{ $roleLabel }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a class="btn btn-secondary" href="{{ route('users.index') }}"> Cancelar</a>
            </div>
        </div>
    </form>
@endsection
