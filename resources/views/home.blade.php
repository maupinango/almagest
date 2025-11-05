@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
     <img src="{{ asset('img/AlmaGestlogo.png') }}" alt="Logo" class="mb-4" style="width:312px; height:auto;">

    <h3>Bienvenido, {{ Auth::user()->firstname }} {{ Auth::user()->secondname }}</h3>

    @if(Auth::user()->type == 'A')
        <a href="{{ route('users.index') }}">CRUD de usuarios</a>
    @endif
</div>
@endsection
