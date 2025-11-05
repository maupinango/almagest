@extends('layouts.app')

@section('content')

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    @if(session('error'))
    
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    <div class="table-container">
        <div class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <th>firstname</th>
                    <th>secondname</th>
                    <th>email</th>
                    <th class="actions-column">Acciones</th>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>
                            <p class="mb-0"> {{ $usuario->firstname }} </p>
                        </td>
                        <td>
                            <p class="mb-0"> {{ $usuario->secondname }} </p>
                        </td>
                        <td>
                            <p class="mb-0"> {{ $usuario->email }} </p>
                        </td>
                        <td>

                            <div class="btn-group-sm d-flex flex-wrap">

                                 @if(!$usuario->activated)
                                    <form action="{{ route('users.activate', $usuario->id) }}" method="POST" class="me-1 mb-1">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                    </form>
                                @endif

                                @if($usuario->activated)
                                    <form action="{{ route('users.desactivate', $usuario->id) }}" method="POST" class="me-1 mb-1">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Desactivar</button>
                                    </form>
                                @endif

                                <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-info btn-sm me-1 mb-1">Editar</a>

                                <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" method="POST" class="me-1 mb-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Estas seguro?')" class="btn btn-success btn-sm">Eliminar</button>
                                </form>

                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection