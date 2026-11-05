<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //listar
    {
        return "Un monton de aulas";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //crear
    {
        echo "Creemos un aula";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //guardar
    {
       echo "guardo en la base de datos";
    }

    /**
     * Display the specified resource.
     */
    public function show(Aula $aula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $cual)
    {
        echo "cual modificar";
 //       return view("aula.modificar");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aula $aula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aula $aula)
    {
        //
    }
}
