@extends('layouts.app')

@section('titulo', 'Registrar equipo')

@section('contenido')
    <h1>Registrar equipo</h1>

    <form method="POST" action="{{ route('equipos.store') }}">
        @csrf

        <label for="codigo">Código</label>
        <input id="codigo" name="codigo" type="text" maxlength="20" value="{{ old('codigo') }}" required>
        @error('codigo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="titulo">Nombre</label>
        <input id="titulo" name="titulo" type="text" maxlength="120" value="{{ old('titulo') }}" required>
        @error('titulo')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="descripcion">Marca</label>
        <textarea id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="fecha_limite">Fecha adquisición</label>
        <input id="fecha_limite" name="fecha_limite" type="date" value="{{ old('fecha_limite') }}" required>
        @error('fecha_limite')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
            <option value="">Seleccione...</option>
            @foreach (\App\Models\Equipo::ESTADOS as $opcion)
                <option value="{{ $opcion }}" @selected(old('estado') === $opcion)>{{ ucfirst(str_replace('_', ' ', $opcion)) }}</option>
            @endforeach
        </select>
        @error('estado')
            <p class="error">{{ $message }}</p>
        @enderror

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ route('equipos.index') }}">Cancelar</a>
        </p>
    </form>
@endsection