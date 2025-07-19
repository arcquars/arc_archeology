@extends('layouts.arqueologia')

@section('title', env("APP_NAME"). ' - Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content-aque')
    <h1>Gestión de Usuarios</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('users.create') }}" title="Crear usuario"><i class="far fa-plus-square"></i></a>
            </div>
        </div>
    </div>

    <table class="table table-sm table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Acción</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td class="text-right">{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge bg-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td class="text-right">
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="far fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="far fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>
 @endsection
