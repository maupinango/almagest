@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
     <img src="{{ asset('img/AlmaGestlogo.png') }}" alt="Logo" class="mb-4" style="width:312px; height:auto;">

    <h3>Bienvenido, {{ Auth::user()->firstname }} {{ Auth::user()->secondname }}</h3>

    <a href="{{ route('users.index') }}">CRUD de usuarios</a>
</div>
@endsection
