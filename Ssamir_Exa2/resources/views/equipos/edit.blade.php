@extends('layouts.app')

@section('titulo', 'Editar tarea')

@section('contenido')
    <h1>Editar equipo</h1>

    <form method="POST" action="{{ route('equipos.update', $equipo->id) }}">
        @csrf
        @method('PUT')

        <label for="codigo">Código</label>
        <input id="codigo" name="codigo" type="text" maxlength="20" value="{{ old('codigo', $equipo->codigo) }}" required>
        @error('codigo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="titulo">Nombre</label>
        <input id="titulo" name="titulo" type="text" maxlength="120" value="{{ old('titulo', $equipo->titulo) }}" required>
        @error('titulo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="descripcion">Marca</label>
        <textarea id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $equipo->descripcion) }}</textarea>
        @error('descripcion')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="fecha_adquisicion">Fecha adquisición</label>
        <input id="fecha_adquisicion" name="fecha_adquisicion" type="date" value="{{ old('fecha_adquisicion', $equipo->fecha_adquisicion->format('Y-m-d')) }}" required>
        @error('fecha_adquisicion')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
            <option value="">Seleccione...</option>
            @foreach (\App\Models\Equipo::ESTADOS as $opcion)
                <option value="{{ $opcion }}" @selected(old('estado', $equipo->estado) === $opcion)>{{ ucfirst(str_replace('_', ' ', $opcion)) }}</option>
            @endforeach
        </select>
        @error('estado')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Actualizar</button>
            <a href="{{ route('equipos.index') }}">Cancelar</a>
        </p>
    </form>
@endsection