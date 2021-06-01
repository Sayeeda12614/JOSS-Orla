<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::latest()->paginate(7);
        return view('orla.admin.ciclos.index')->with('ciclos',$ciclos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*  $request->validate([
            'nombre' => 'required'
        ]); */
        
        // $data = $request->all();
        // if($data['nombre']==""){
        //     return redirect()->route('ciclos.index')
        //         ->with('error','Campo requerido');

        // }else{
        //     Ciclo::create($data);
        // return redirect()->route('ciclos.index');
        // }
        $data = $request->all();
        Ciclo::create($data);
        return redirect()->route('ciclos.index')->with('mensaje','Creado correctamente');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciclo = Ciclo::all()->find($id);
        return view('orla.admin.ciclos.edit', compact('ciclo', $ciclo));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        // Valida el campo nombre  
        $request->validate([
            'nombre' => 'required'
        ]);

        $ciclo = Ciclo::all()->find($id);
        if($ciclo != null){
            $data = $request->all();
            $ciclo->update($data);
            return redirect()->route('ciclos.index')->with('mensaje', 'Actualizado correctamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciclo = Ciclo::all()->find($id);
        Ciclo::all()->find($id)->delete();
        return redirect()->route('ciclos.index');
    }
}
