<?php

namespace App\Http\Controllers;

use App\Models\ClaveRegistro;
use Illuminate\Http\Request;

class AccesoRegistroControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orla.admin.index');
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
        $claveOriginal = ClaveRegistro::all()->where('clave',$claveEnviada);
        $clave = ClaveRegistro::all()->where('clave',$claveEnviada);
    
        foreach($claveOriginal as $c ){
            $claveOriginal = $c['clave']; 
        }

         if($claveEnviada==$claveOriginal){
            return redirect()->route('register');
        }if($claveEnviada!=$claveOriginal){
            return redirect()->route('registro.index')
                ->with('error','Lo sentimos, No se reconoce la clave');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClaveRegistro  $claveRegistro
     * @return \Illuminate\Http\Response
     */
    public function show(ClaveRegistro $claveRegistro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClaveRegistro  $claveRegistro
     * @return \Illuminate\Http\Response
     */
    public function edit(ClaveRegistro $claveRegistro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClaveRegistro  $claveRegistro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClaveRegistro $claveRegistro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClaveRegistro  $claveRegistro
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClaveRegistro $claveRegistro)
    {
        //
    }
}
