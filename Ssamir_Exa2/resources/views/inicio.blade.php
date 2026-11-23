@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Bienvenido, {{ auth()->user()->name }}</h1>
    <p>Sesión iniciada correctamente con el usuario <strong>{{ auth()->user()->usuario }}</strong>.</p>
@endsection