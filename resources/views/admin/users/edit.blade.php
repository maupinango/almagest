@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="form-con">

                    <h1 class="h3 mb-4 form-title">Editar Usuario</h1>

                    <form action="{{ route('users.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="firstname" class="form-label fw-semibold">Nombre:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $usuario->firstname) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="secondname" class="form-label fw-semibold">Segundo nombre:</label>
                            <input type="text" class="form-control" id="secondname" name="secondname" value="{{ old('secondname', $usuario->secondname) }}" required>
                        </div>

                        <div class="mb-3">
                           <label for="email" class="form-label fw-semibold">Email:</label>
                           <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-custom">Cancelar</a>
                            <button type="submit" class="btn btn-primary btn-custom">Actualizar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection