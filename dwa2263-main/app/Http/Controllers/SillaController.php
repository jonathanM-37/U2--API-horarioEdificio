<?php

namespace App\Http\Controllers;

use App\Models\Silla;
use Illuminate\Http\Request;

class SillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sillas = Silla::all();
        return $sillas->toJson();
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nueva = new Silla();
        $nueva->inventario = $request->input('inventario') ;
        $nueva->color = $request->input('color') ;
        $nueva->save();
        return $nueva->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(Silla $silla)
    {
        return $silla->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Silla $silla)
    {
        $silla->inventario = $request->input('inventario') ;
        $silla->color = $request->input('color') ;
        $silla->save();
        return $silla->toJson();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Silla $silla)
    {
        $silla->delete();
        return $silla->toJson();
    }
}
