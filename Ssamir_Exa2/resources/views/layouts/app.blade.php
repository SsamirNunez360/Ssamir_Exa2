<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', config('app.name'))</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 960px; margin: 2rem auto; padding: 0 1rem; color: #1f2937; }
        header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #d1d5db; padding-bottom: .75rem; margin-bottom: 1.5rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #d1d5db; padding: .55rem .7rem; text-align: left; }
        th { background: #f3f4f6; }
        label { display: block; margin-top: .8rem; font-weight: 600; }
        input, select, textarea { width: 100%; max-width: 420px; padding: .45rem; margin-top: .25rem; border: 1px solid #9ca3af; border-radius: 4px; }
        button, .boton { display: inline-block; padding: .45rem .9rem; background: #1d4ed8; color: #fff; border: 0; border-radius: 4px; text-decoration: none; cursor: pointer; }
        .exito { background: #dcfce7; border: 1px solid #86efac; padding: .65rem; border-radius: 4px; margin-bottom: 1rem; }
        .error { color: #b91c1c; font-size: .9rem; margin-top: .25rem; }
        .vacio { text-align: center; color: #6b7280; padding: 1.5rem; }
    </style>
</head>
<body>
    @auth
        <header>
            <strong>{{ config('app.name') }}</strong>
            <div>
                <span>Usuario: {{ auth()->user()->usuario }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left:.75rem">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </div>
        </header>
    @endauth

    @if (session('exito'))
        <div class="exito">{{ session('exito') }}</div>
    @endif

    @yield('contenido')
</body>
</html>