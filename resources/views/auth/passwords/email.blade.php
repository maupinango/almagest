@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center bg-light" style="min-height: 80vh; padding-top: 5px;">
    <img src="{{ asset('img/AlmaGestlogo.png') }}" alt="Logo" class="mb-4" style="width:280px; height:auto;">


    {{-- Tarjeta de formulario --}}
    <div class="card shadow-lg border-0 rounded-4" style="width: 420px; background: #ffffff; border-top: 4px solid #0d6efd;">
        <div class="card-body p-5">
            <h3 class="text-center mb-4 fw-bold" style="color:#0d6efd;">
                {{ __('Restablecer contraseña') }}
            </h3>

            @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">{{ __('Correo electrónico') }}</label>
                    <input id="email" type="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Botón principal --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg fw-semibold"
                        style="background: linear-gradient(90deg, #007bff, #6f42c1); border:none;">
                        {{ __('Enviar enlace de restablecimiento') }}
                    </button>
                </div>

                {{-- Enlace para volver --}}
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}"
                       class="text-decoration-none fw-semibold"
                       style="color:#007bff;">
                        {{ __('Volver al inicio de sesión') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
