@extends('layouts.app')

@section('content')

    @if(session('success'))
        {{ session('success') }}
    @endif

    @if(session('error'))
        {{ session('error') }}
    @endif

    <table>
        <thead>
            <th>firstname</th>
            <th>secondname</th>
            <th>email</th>
            <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>
                    <p> {{ $usuario->firstname }} </p>
                </td>
                <td>
                    <p> {{ $usuario->secondname }} </p>
                </td>
                <td>
                    <p> {{ $usuario->email }} </p>
                </td>
                <td>
                    @if($usuario->email_confirmed && !$usuario->activated)
                        <form action="{{ route('users.activate', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Activar</button>
                        </form>
                    @endif

                    @if($usuario->activated)
                        <form action="{{ route('users.desactivate', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Desactivar</button>
                        </form>
                    @endif

                    <a href="{{ route('users.edit', $usuario->id) }}">Editar</a>

                    <form action="{{ route('users.destroy', $usuario->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Estas seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection