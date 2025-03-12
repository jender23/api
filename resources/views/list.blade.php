@extends('layouts.app')

@section('title', 'Personajes Guardados')

@section('content')
<div class="container">
    <h2>Personajes Guardados en la Base de Datos</h2>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Especie</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($characters as $character)
                <tr>
                    <td>{{ $character->id }}</td>
                    <td>{{ $character->name }}</td>
                    <td>{{ $character->status }}</td>
                    <td>{{ $character->species }}</td>
                    <td>
                        <a href="{{ route('characters.edit', $character->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
