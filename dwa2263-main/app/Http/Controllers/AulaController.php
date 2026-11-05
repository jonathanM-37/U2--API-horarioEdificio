<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aulas = Aula::all();


        return view('aula.listado', compact('aulas'));
        return "muestra todas las aulas";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

//       return "que me muestre un formulario";
        return view("aula.agregar");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "guardo en la base de datos";        
//        dump($request->all());

        $aula = new Aula();
        $aula->nombre =  $request->input('nombre');
        $aula->capacidad =  $request->input('capacidad');
        if($request->input('wifi',"NO")=="ON"){
            $aula->wifi = true;
        }else{
            $aula->wifi = false;
        }
        $aula->save();
        return redirect(route('aulas.listar'));

    }

    /**
     * Display the specified resource.
     */
    public function show($x)
    {
        return "mostrare la aula $x";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cual)
    {
        $aula = Aula::find($cual);
//        echo "cual modificar";
        return view("aula.modificar",compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $x) //Aula $aula
    {
//        dump($x);
//        dump($request->all());
        //ANTERIOR = NUEVO
        $anterior = Aula::find($x);
        $anterior->nombre = $request->input('nombre');
        $anterior->capacidad =  $request->input('capacidad');
        if($request->input('wifi',"NO")=="ON"){
            $anterior->wifi = true;
        }else{
            $anterior->wifi = false;
        }
        $anterior->save();
        echo "actualiza el aula";
        return redirect(route('aulas.listar'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($x)
    {
        echo "Borrar el aula $x";
        $anterior = Aula::find($x);
        $anterior->delete();
        return redirect(route('aulas.listar'));
    }
}
