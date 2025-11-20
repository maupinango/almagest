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

    <a href="{{ route('articles.create') }}">Agregar</a>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio min</th>
                        <th>Pecrio max</th>
                        <th>Color</th>
                        <th>Weight</th>
                        <th>Size</th>
                        <th class="actions-column">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->price_min }}</td>
                        <td>{{ $article->price_max }}</td>
                        <td>{{ $article->color_name }}</td>
                        <td>{{ $article->weight }}</td>
                        <td>{{ $article->size }}</td>
                        <td>
                            <div class="d-flex flex-wrap justify-content-center gap-1">

                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro?')" class="btn btn-primary btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection