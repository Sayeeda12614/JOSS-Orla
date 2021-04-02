<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\Clave;
use Illuminate\Http\Request;

class IntegrantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Creamos la funcion donde mostrara los integrantes
        $integrantes = Integtante::All();
        return $integrante;

        try{
            $array=Integtante::with("cursos", "ciclos", "users")->get();
            $result=[];
            foreach ($array as $item) {
                $curso = array(
                    "id" => $item->cursos->id,
                    "anio" => $item->cursos->anio
                );
                $ciclo = array(
                    "id" => $item->ciclos->id,
                    "nombre" => $item->ciclos->nombre
                );
                $user = array(
                    "id" => $item->users->id,
                    "name" => $item->users->name,
                    "apellidos" => $item->users->apellidos,
                    "tipo" => $item->users->tipo
                );
                $integrante = array(
                    "id"=>$item->id,
                    "nombre" => $item->nombre,
                    "apellidos" => $item->apellidos,
                    "foto" => $item->foto,
                    "tipo" => $item->tipo,
                    "tutor" => $user,
                    "ciclo" => $ciclo,
                    "curso" => $curso
                );
                $result[] = $integrante;
            }
            return response()->json($result);
        }
        catch(\Exception $e){
            return response("No hay datos para mostrar o habido un error del servidor",500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function show(Integrante $integrante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function edit(Integrante $integrante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Integrante $integrante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Integrante $integrante)
    {
        //
    }
}
