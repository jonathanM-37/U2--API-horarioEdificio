<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    /**
     * GET /api/edificios
     * Devuelve todos los edificios con sus aulas.
     */
    public function index()
    {
        $edificios = Edificio::with('aulas')->get();
        return response()->json($edificios);
    }

    /**
     * POST /api/edificios
     * Crea un nuevo edificio.
     * Body JSON: { "nombre": "Edificio C" }
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $edificio = new Edificio();
        $edificio->nombre = $request->input('nombre');
        $edificio->save();

        return response()->json($edificio, 201);
    }

    /**
     * GET /api/edificios/{id}
     * Muestra un edificio con sus aulas.
     */
    public function show(Edificio $edificio)
    {
        return response()->json($edificio->load('aulas'));
    }

    /**
     * PUT/PATCH /api/edificios/{id}
     * Actualiza el nombre de un edificio.
     * Body JSON: { "nombre": "Edificio C Modificado" }
     */
    public function update(Request $request, Edificio $edificio)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $edificio->nombre = $request->input('nombre');
        $edificio->save();

        return response()->json($edificio);
    }

    /**
     * DELETE /api/edificios/{id}
     * Elimina un edificio.
     */
    public function destroy(Edificio $edificio)
    {
        $edificio->delete();

        return response()->json([
            'mensaje' => 'Edificio eliminado correctamente',
            'edificio' => $edificio,
        ]);
    }
}
