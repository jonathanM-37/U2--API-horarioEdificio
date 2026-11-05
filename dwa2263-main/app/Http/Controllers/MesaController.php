<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesa.listado',compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mesa.agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        dump($request->input('inventario'));

        $nueva = new Mesa();
        $nueva->inventario = $request->input('inventario') ;
        $nueva->inventario = $datos['inventario'] ;
        $nueva->save();
        return redirect(route('mesas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mesa $mesa)
    {
        dump($mesa->created_at);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mesa $mesa)
    {

        return view('mesa.editar',compact('mesa'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mesa $mesa)
    {
        $mesa->inventario = $request->input('inventario');
        $mesa->save();
        return redirect(route('mesas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mesa $mesa)
    {
        $mesa->delete();
        return redirect(route('mesas.index'));
    }
}
