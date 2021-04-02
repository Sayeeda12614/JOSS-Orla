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
        // $integrantes = Integtante::All();
        // return $integrante;

        try{
            $array=Integrante::with("users", "ciclos", "cursos")->get();
            $result=[];
            foreach ($array as $item) {
                $user = array(
                    "name" => $item->users->name,
                    "apellidos" => $item->users->apellidos
                );
                $ciclo = array(
                    "nombre" => $item->ciclos->nombre
                );
                $curso = array(
                    "anio" => $item->cursos->anio
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
            return response("Controlador: Habido un error del servidor",500);
        }
    }

    public function none(){
        $result=[];
        $Integrantes=Integrante::all();
        if($Integrantes!=null || count($Integrantes)>0){
            foreach($Integrantes as $Integrante){
                $result[]=
                    [
                        "id"=>$Integrante->id,
                        "nombre"=>$Integrante->nombre,
                        "apellidos"=>$Integrante->apellidos,
                        "ciclo"=>$Integrante->ciclo,
                        "curso"=>$Integrante->curso
                    ];
            }
        }
        if($result!=[]){
            $result = response()->json($result);
        }else{
            $result = response("No se han podido devolver datos o no existen",404);
        }
        return $result;
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
