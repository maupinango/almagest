@extends('layouts.admin')

@section('content')

    @if(session('success'))
        {{ session('success') }}
    @endif

    @if(session('error'))
        {{ session('error') }}
    @endif

    <table>
        <thead>
            <th>firstname</th>
            <th>secondname</th>
            <th>email</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>
                    <p> {{ $usuario->firstname }} </p>
                </td>
                <td>
                    <p> {{ $usuario->secondname }} </p>
                </td>
                <td>
                    <p> {{ $usuario->email }} </p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsenction