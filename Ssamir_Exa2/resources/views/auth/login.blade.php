@extends('layouts.app')

@section('titulo', 'Iniciar sesión')

@section('contenido')
    <h1>{{ config('app.name') }}</h1>
    <h2>Iniciar sesión</h2>

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <label for="usuario">Usuario</label>
        <input id="usuario" name="usuario" type="text" value="{{ old('usuario') }}" required autofocus>
        @error('usuario')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" required>
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror

        <p><button type="submit">Entrar</button></p>
    </form>
@endsection