<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = auth()->user()->equipos()->paginate(10);

        return view('equipos.index')->with('equipos', $equipos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        request()->validate([
            'nombre' => ['required', 'unique:equipos', 'min:3', 'max:100'],
            'siglas' => ['required', 'min:1', 'max:3'],
            'ciudad' => ['required', 'min:3', 'max:50'],
            'pais' => ['required', 'min:3', 'max:50'],
            'anioFundacion' => ['required', 'integer', 'min:1800', 'max:' . date('Y')],
        ]);

        // Crear un nuevo equipo
        $equipo = new Equipo();

        // Asignar los valores del formulario
        $equipo->nombre = $request->input('nombre');
        $equipo->siglas = $request->input('siglas');
        $equipo->ciudad = $request->input('ciudad');
        $equipo->pais = $request->input('pais');
        $equipo->anioFundacion = $request->input('anioFundacion');

        // Asignar el usuario logueado como creador
        $equipo->user_id = auth()->id();

        // Guardar en la base de datos
        $resultado = $equipo->save();

        // Redirigir con mensaje
        if ($resultado) {
            return redirect()->route('equipos.index')->with('status', 'Equipo creado exitosamente');
        } else {
            return back()->withErrors(['error' => 'No se pudo guardar el equipo'])->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipos = Equipo::with('user', 'jugadores')->findOrFail($id);
        return view('equipos.show')->with('equipo',$equipos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipos = Equipo::with('user', 'jugadores')->findOrFail($id);
        return view('equipos.formulario')->with('equipo',$equipos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Buscar el equipo por ID
        $equipo = Equipo::findOrFail($id);

        // Validación (evita que el nombre único choque con el actual)
        request()->validate([
            'nombre' => ['required', 'min:3', 'max:100', 'unique:equipos,nombre,'. $id],
            'siglas' => ['required', 'min:1', 'max:3'],
            'ciudad' => ['required', 'min:3', 'max:50'],
            'pais' => ['required', 'min:3', 'max:50'],
            'anioFundacion' => ['required', 'integer', 'min:1800', 'max:' . date('Y')],
        ]);

        // Actualizar los datos
        $equipo->nombre = $request->input('nombre');
        $equipo->siglas = $request->input('siglas');
        $equipo->ciudad = $request->input('ciudad');
        $equipo->pais = $request->input('pais');
        $equipo->anioFundacion = $request->input('anioFundacion');

        $resultado = $equipo->save();

        // Redirigir
        if ($resultado) {
            return redirect()->route('equipos.index')->with('status', 'Equipo actualizado correctamente');
        } else {
            return back()->withErrors(['error' => 'No se pudo actualizar el equipo'])->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipo = Equipo::findOrFail($id);

        if ($equipo->user_id !== auth()->id()) {
            abort(403);
        }

        $equipo->delete();

        return redirect()->route('equipos.index')->with('status', 'Equipo eliminado correctamente.');

    }
}
