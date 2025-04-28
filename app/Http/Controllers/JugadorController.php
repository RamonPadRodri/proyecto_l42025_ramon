<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $jugadores = Jugador::query();

        $equipo = null;

        if ($request->has('equipo_id')) {
            $equipo = Equipo::findOrFail($request->equipo_id);
            $jugadores->where('equipo_id', $equipo->id);
        }

        $jugadores = $jugadores->with('equipo')->paginate(10);

        return view('jugadores.index', compact('jugadores', 'equipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($equipo_id)
    {
        $equipo = Equipo::find($equipo_id);  // Busca el equipo por su ID

        return view('jugadores.formulario', compact('equipo'));  // Pasa el equipo a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        request()->validate([
            'nombre' => ['required', 'min:3', 'max:100'],
            'codigo' => ['required', 'unique:jugadores', 'digits:3',],
            'posicion' => ['required', 'min:2', 'max:50', 'in:Portero,Defensa,Centrocampista,Delantero'],
            'edad' => ['required', 'integer', 'min:15', 'max:50'],
            'pais' => ['required', 'min:3', 'max:50'],
        ]);

        // Crear un nuevo jugador
        $jugador = new Jugador();

        // Asignar los valores del formulario
        $jugador->nombre = $request->input('nombre');
        $jugador->codigo = 'JUG-' . $request->input('codigo');
        $jugador->posicion = $request->input('posicion');
        $jugador->edad = $request->input('edad');
        $jugador->pais = $request->input('pais');

        $equipo = Equipo::find($request->input('equipo_id'));

        if ($equipo) {
            // Asignar el equipo mediante la relación
            $jugador->equipo()->associate($equipo);
        } else {
            return back()->withErrors(['equipo_id' => 'Equipo no encontrado'])->withInput();
        }

        // Guardar en la base de datos
        $resultado = $jugador->save();

        // Redirigir con mensaje
        if ($resultado) {
            return redirect()->route('jugadores.index', ['equipo_id' => $jugador->equipo_id])
                ->with('status', 'Jugador creado exitosamente');
        } else {
            return back()->withErrors(['error' => 'No se pudo guardar el jugador'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Buscar el jugador que se va a editar
        $jugador = Jugador::findOrFail($id);

        // Buscar el equipo relacionado con el jugador
        $equipo = $jugador->equipo;

        // Retornar a la vista con los datos necesarios
        return view('jugadores.formulario', compact('jugador', 'equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el jugador que vamos a actualizar
        $jugador = Jugador::findOrFail($id);

        // Validación
        $request->validate([
            'nombre' => ['required', 'min:3', 'max:100'],
            'codigo' => [
                'required',
                'digits:3',
                'unique:jugadores,codigo,'.$id,
            ],
            'posicion' => ['required', 'min:2', 'max:50', 'in:Portero,Defensa,Centrocampista,Delantero'],
            'edad' => ['required', 'integer', 'min:15', 'max:50'],
            'pais' => ['required', 'min:3', 'max:50'],
        ]);

        // Asignar los nuevos valores
        $jugador->nombre = $request->input('nombre');
        $jugador->codigo = 'JUG-' . $request->input('codigo');
        $jugador->posicion = $request->input('posicion');
        $jugador->edad = $request->input('edad');
        $jugador->pais = $request->input('pais');

        $equipo = Equipo::find($request->input('equipo_id'));

        if ($equipo) {
            $jugador->equipo()->associate($equipo);
        } else {
            return back()->withErrors(['equipo_id' => 'Equipo no encontrado'])->withInput();
        }

        // Guardar cambios en la base de datos
        $resultado = $jugador->save();

        // Redirigir con mensaje
        if ($resultado) {
            return redirect()->route('jugadores.index', ['equipo_id' => $jugador->equipo_id])
                ->with('status', 'Jugador actualizado exitosamente');
        } else {
            return back()->withErrors(['error' => 'No se pudo actualizar el jugador'])->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el jugador
        $jugador = Jugador::findOrFail($id);

        // Validar que el jugador pertenezca a un equipo del usuario autenticado (opcional según tu modelo)
        if ($jugador->equipo->user_id !== auth()->id()) {
            abort(403); // No autorizado
        }

        // Eliminar el jugador
        $jugador->delete();

        // Redireccionar con mensaje de éxito
        return redirect()->route('jugadores.index', ['equipo_id' => $jugador->equipo_id])
            ->with('status', 'Jugador eliminado correctamente.');
    }
}
