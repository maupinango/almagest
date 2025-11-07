@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
     <img src="{{ asset('img/AlmaGestlogo.png') }}" alt="Logo" class="mb-4" style="width:312px; height:auto;">

    <h3>Bienvenido, {{ Auth::user()->firstname }} {{ Auth::user()->secondname }}</h3>

    @if(Auth::user()->type == 'A')

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('users.index') }}" class="text-decoration-none">
                        <div class="card user-card shadow-sm border-0" style="background: #635bc8;">
                            <div class="card-body text-center p-4">
                                <div class="user-icon mb-3" style="color: white; font-size: 30px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="user-count mb-2" style="color: white; font-size: 30px;">
                                    {{ $usuariosCant ?? 0 }}
                                </div>
                                <div class="user-label" style="color: white; font-size: 30px;">
                                    Usuarios
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    @endif
</div>
@endsection
