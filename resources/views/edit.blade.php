@extends('layouts.app')

@section('title', 'Editar Personaje')

@section('content')
<div class="container">
    <h2>Editar Personaje</h2>

    <form method="POST" action="{{ route('characters.update', $character->id) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $character->name }}" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="status" class="form-control">
                <option value="Alive" {{ $character->status == 'Alive' ? 'selected' : '' }}>Vivo</option>
                <option value="Dead" {{ $character->status == 'Dead' ? 'selected' : '' }}>Muerto</option>
                <option value="unknown" {{ $character->status == 'unknown' ? 'selected' : '' }}>Desconocido</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Especie</label>
            <input type="text" name="species" class="form-control" value="{{ $character->species }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Género</label>
            <select name="gender" class="form-control">
                <option value="Male" {{ $character->gender == 'Male' ? 'selected' : '' }}>Masculino</option>
                <option value="Female" {{ $character->gender == 'Female' ? 'selected' : '' }}>Femenino</option>
                <option value="unknown" {{ $character->gender == 'unknown' ? 'selected' : '' }}>Desconocido</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('characters.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
