@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex flex-column justify-content-center align-items-center min-vh-90 bg-light">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="width: 400px;">
        <h1 class="h3 mb-4 text-center text-primary fw-bold">Agregar articulo</h1>

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Descripcion:</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>

            <div class="mb-3">
                <label for="price_min" class="form-label fw-semibold">Precio minimo:</label>
                
                <select id="price_min" name="price_min" required>
                    @for($i = 1; $i <= 50; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="price_max" class="form-label fw-semibold">Precio maximo:</label>
                
                <select id="price_max" name="price_max" required>
                    @for($i = 2; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="color_name" class="form-label fw-semibold">Color:</label>
                
                <select id="color_name" name="color_name" required>
                    <option value="Blanco">Blanco</option>
                    <option value="Azul">Azul</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Verde">Verde</option>
                    <option value="Ocre">Ocre</option>
                    <option value="Violeta">Violeta</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label fw-semibold">Peso:</label>
                
                <select id="weight" name="weight" required>
                    <option value="0.25">0,25 kg</option>
                    <option value="0.5">0,5 kg</option>
                    <option value="1">1 kg</option>
                    <option value="2">2 kg</option>
                    <option value="5">5 kg</option>
                    <option value="25">25 kg</option>
                </select>
            </div>

            <!-- AQUI: size -->
            
            <div class="mb-3">
                <label for="family_id" class="form-label fw-semibold">Familia:</label>
                
                <select id="family_id" name="family_id" required>
                    @foreach($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-50">Cancelar</a>
                <button type="submit" class="btn btn-primary w-50">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection