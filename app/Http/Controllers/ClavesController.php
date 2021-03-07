<?php

namespace App\Http\Controllers;

use App\Models\Clave;
use App\Models\Curso;
use App\Models\Ciclo;
use Illuminate\Http\Request;

class ClavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claves = Clave::all();
        return view('orla.tutores.claves.index',compact('claves',$claves));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        $ciclos = Ciclo::all();
        return view('orla.tutores.claves.create')->with(['cursos'=>$cursos,'ciclos'=>$ciclos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Clave::create($data);
        return redirect()->route('claves.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clave  $clave
     * @return \Illuminate\Http\Response
     */
    public function show(Clave $clave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clave  $clave
     * @return \Illuminate\Http\Response
     */
    public function edit(Clave $clave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clave  $clave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clave $clave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clave  $clave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clave $clave)
    {
        //
    }
}
