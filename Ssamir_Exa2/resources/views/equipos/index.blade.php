@extends('layouts.app')

@section('titulo', 'Control de equipos')

@section('contenido')
    <h1>Control de equipos</h1>
    <p><a class="boton" href="{{ route('equipos.create') }}">Registrar equipo</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Título</th>
                <th>Marca</th>
                <th>Fecha adquisición</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->codigo }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->marca ?: '—' }}</td>
                    <td>{{ $equipo->fecha_adquisicion->format('d/m/Y') }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $equipo->estado)) }}</td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo->id) }}">Editar</a>

                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="vacio">No hay equipos registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection