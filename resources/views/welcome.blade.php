@extends('layouts.app')

@section('content')

<!-- Cargar fuente desde Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">

<div class="w-100 position-relative" style="height: 300px; margin-top:0; padding-top:0;">
    <!-- Imagen del banner como fondo -->
    <img src="{{ asset('img/Almacen.png') }}"
         alt="Logo"
         class="img-fluid w-100 h-100"
         style="object-fit: cover; display: block;">

    <!-- Contenido centrado encima de la imagen -->
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold"
            style="color: black; font-family: 'Poppins', sans-serif;">
            Bienvenido a
        </h1>
        <img src="{{ asset('img/AlmaGestlogo.png') }}"
             alt="Logo secundario"
             style="height: 80px; width: auto;">
    </div>
</div>

<div class="container text-center mt-5">
    <!-- Título principal -->
    <h1 class="fw-bold" style="color: black; font-family: 'Poppins', sans-serif;">
        ¿Qué es AlmaGest?
    </h1>

    <!-- Párrafo descriptivo -->
    <p class="mt-3" style="font-family: 'Poppins', sans-serif; color: #333; font-size: 18px;">
        AlmaGest es una aplicación web y móvil destinada a gestionar el departamento de compra-venta
        de varias empresas que colaboran entre sí, permitiendo que cada empresa administre su propio
        catálogo y stock de productos, así como realizar operaciones comerciales entre empresas de
        forma controlada y automatizada.
    </p>



@endsection
