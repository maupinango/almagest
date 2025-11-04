@extends('layouts.app')
@section('content')
<div class="d-flex flex-column justify-content-center align-items-center min-vh-90 bg-light">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <img src="{{ asset('img/AlmaGestlogo.png') }}" alt="Logo" class="mb-4" style="width:312px; height:auto;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 400px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4 text-primary fw-bold">{{ __('Iniciar sesión') }}</h3>
            <div class="text-center">
            <img src="{{ asset('img/iconoLogin.png') }}" alt="Icono" class="mb-4" style="width: 120px; height:auto;">
            </div>

            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
               </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
                    <input id="email" type="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Recordarme') }}
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        {{ __('Entrar') }}
                    </button>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-center mt-3">
                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

