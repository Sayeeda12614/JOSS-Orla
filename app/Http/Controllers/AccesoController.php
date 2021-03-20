<?php

namespace App\Http\Controllers;
use App\Models\Clave;
use App\Models\Integrante;
use Illuminate\Http\Request;

class AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $claveEnviada = $request->input('codigo');
        $claveOriginal = Clave::all()->where('clave',$claveEnviada);
        $clave = Clave::all()->where('clave',$claveEnviada);
      
        
        foreach($claveOriginal as $c ){
           $claveOriginal = $c['clave']; 
        }

        if($claveEnviada==$claveOriginal){
            return view('orla.integrantes.create',compact('clave',$clave));
        }if($claveEnviada!=$claveOriginal){
            return view('welcome');
        } 
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
