@extends('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center min-vh-90 bg-light">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="width: 400px;">
        <h1 class="h3 mb-4 text-center text-primary fw-bold">Editar Usuario</h1>

        <form action="{{ route('users.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="firstname" class="form-label fw-semibold">Nombre:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $usuario->firstname) }}" required>
            </div>

            <div class="mb-3">
                <label for="secondname" class="form-label fw-semibold">Apellido:</label>
                <input type="text" class="form-control" id="secondname" name="secondname" value="{{ old('secondname', $usuario->secondname) }}" required>
            </div>

            <div class="mb-3">
                <label for="company_id" class="form-label fw-semibold">Compañía:</label>
                <input type="text" class="form-control" id="company_id" name="company_id" value="{{ old('company_id', $usuario->company_id) }}" required>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-50">Cancelar</a>
                <button type="submit" class="btn btn-primary w-50">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection