<?php

namespace App\Http\Controllers;

use App\Models\ClaveRegistro;
use App\Models\Curso;
use Illuminate\Http\Request;

class ClaveRegistroControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claves_registro = ClaveRegistro::all();
        return view('orla.admin.claves_registro.index',compact('claves_registro',$claves_registro));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        
        return view('orla.admin.claves_registro.create',compact('cursos',$cursos));
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
        ClaveRegistro::create($data);
        return redirect()->route('claves_registro.index')
        ->with('success',$data['clave'].' Creada exitoxamente');
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
    public function edit()
    {
        
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClaveRegistro  $claveRegistro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clave_id)
    {
        
        
        return redirect()->route();
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClaveRegistro  $claveRegistro
     * @return \Illuminate\Http\Response
     */
    public function destroy($clave_id)
    {
        $clave = ClaveRegistro::all()->find($clave_id);
        ClaveRegistro::all()->find($clave_id)->delete();
        return redirect()->route('claves_registro.index')
            ->with('success','La clave: '.$clave['clave'].', ha sido eliminado exitosamente');
    }
}
