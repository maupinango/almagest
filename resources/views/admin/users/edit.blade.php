@extends('layouts.app')

@section('content')

    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="firstname" value="{{ old('firstname', $usuario->firstname) }}" required>

        <label>Segundo nombre:</label>
        <input type="text" name="secondname" value="{{ old('secondname', $usuario->secondname) }}" required>

         <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required>

        <button type="submit">Actualizar</button>
        <a href="{{ route('users.index') }}">Cancelar</a>
    </form>

@endsection