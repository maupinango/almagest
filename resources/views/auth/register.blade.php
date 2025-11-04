@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center min-vh-90 bg-light">
    {{-- Logo principal --}}
    <img src="{{ asset('img/AlmaGestlogo.png') }}" alt="Logo" class="mb-4" style="width:312px; height:auto;">

    {{-- Tarjeta del registro --}}
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4 text-primary fw-bold">{{ __('Registro de usuario') }}</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nombre --}}
                <div class="mb-3">
                    <label for="firstname" class="form-label">{{ __('Nombre') }}</label>
                    <input id="firstname" type="text"
                        class="form-control form-control-lg @error('firstname') is-invalid @enderror"
                        name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                    @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Apellidos --}}
                <div class="mb-3">
                    <label for="secondname" class="form-label">{{ __('Apellidos') }}</label>
                    <input id="secondname" type="text"
                        class="form-control form-control-lg @error('secondname') is-invalid @enderror"
                        name="secondname" value="{{ old('secondname') }}" required autocomplete="secondname" autofocus>
                    @error('secondname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Correo electrónico') }}</label>
                    <input id="email" type="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Compañia --}}
                <div class="mb-3">
                    <label for="company_id" class="form-label">{{ __('Compañía') }}</label>
                        <select id="company_id"
                        class="form-control form-control-lg @error('company_id') is-invalid @enderror"
                        name="company_id" required>
                            <option value="">{{ __('Selecciona una compañía') }}</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirmación de Password --}}
                <div class="mb-4">
                    <label for="password-confirm" class="form-label">{{ __('Confirmar contraseña') }}</label>
                    <input id="password-confirm" type="password"
                        class="form-control form-control-lg"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                {{-- Botón --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                    {{ __('Registrarse') }}
                    </button>
                </div>

                {{-- Enlace para volver al login --}}
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary">
                    {{ __('¿Ya tienes una cuenta? Inicia sesión') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

