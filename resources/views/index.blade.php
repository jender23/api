@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Personajes</h2>
    <form method="POST" action="{{ route('characters.store') }}">
        @csrf
        <button type="submit" class="btn btn-success">Guardar en Base de Datos</button>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Especie</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($characters as $character)
                <tr>
                    <td>{{ $character['id'] }}</td>
                    <td>{{ $character['name'] }}</td>
                    <td>{{ $character['status'] }}</td>
                    <td>{{ $character['species'] }}</td>
                    <td>
                        <button onclick="showDetails({{ json_encode($character) }})" class="btn btn-primary">Detalles</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal para Detalles -->
<div id="detailsModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del Personaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Tipo:</strong> <span id="characterType"></span></p>
                <p><strong>Género:</strong> <span id="characterGender"></span></p>
                <p><strong>Origen:</strong> <span id="characterOrigin"></span></p>
                <img id="characterImage" class="img-fluid" />
            </div>
        </div>
    </div>
</div>

<script>
    function showDetails(character) {
        document.getElementById('characterType').textContent = character.type || 'N/A';
        document.getElementById('characterGender').textContent = character.gender;
        document.getElementById('characterOrigin').textContent = character.origin.name;
        document.getElementById('characterImage').src = character.image;

        var modal = new bootstrap.Modal(document.getElementById('detailsModal'));
        modal.show();
    }
</script>
@endsection
