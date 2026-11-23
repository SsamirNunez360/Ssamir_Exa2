<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::orderBy('id')->get();

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:30', 'unique:equipos,codigo'],
            'nombre' => ['required', 'string', 'max:100'],
            'marca' => ['required', 'string', 'max:80'],
            'fecha_adquisicion' => ['required', 'date'],
            'estado' => ['required', 'in:' . implode(',', Equipo::ESTADOS)],
        ]);

        $equipo = new Equipo();
        $equipo->codigo = $datos['codigo'];
        $equipo->titulo = $datos['titulo'];
        $equipo->descripcion = $datos['descripcion'] ?? null;
        $equipo->fecha_adquisicion = $datos['fecha_adquisicion'];
        $equipo->estado = $datos['estado'];
        $equipo->save();

        return redirect()
            ->route('equipos.index')
            ->with('exito', 'Equipo registrado correctamente.');
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);

        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);

        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:30', Rule::unique('equipos', 'codigo')->ignore($equipo)],
            'nombre' => ['required', 'string', 'max:100'],
            'marca' => ['required', 'string', 'max:80'],
            'fecha_adquision' => ['required', 'date'],
            'estado' => ['required', 'in:' . implode(',', Equipo::ESTADOS)],
        ]);

        $equipo->codigo = $datos['codigo'];
        $equipo->nombre = $datos['nombre'];
        $equipo->marca = $datos['marca'];
        $equipo->fecha_adquisicion = $datos['fecha_adquisicion'];
        $equipo->estado = $datos['estado'];
        $equipo->save();

        return redirect()
            ->route('equipos.index')
            ->with('exito', 'Equipo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()
            ->route('equipos.index')
            ->with('exito', 'Equipo eliminada correctamente.');
    }
}