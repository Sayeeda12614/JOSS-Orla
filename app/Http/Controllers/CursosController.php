<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::latest()->orderBy('anio','desc')->paginate(7);
        return view('orla.admin.cursos.index')->with('cursos',$cursos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orla.admin.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'anio' => 'required'
        ]);

        $data = $request->all();
        
        if($data['anio']<2000){
            return redirect()->route('cursos.index')
            ->with('error','FALLO :( El año debe ser igual o superior a 2000');
        }

        if($data['anio']>=2000){
            Curso::create($data);
            return redirect()->route('cursos.index')
                ->with('success','ÉXITO :) Curso creado');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::all()->find($id);
        return view('orla.admin.cursos.edit', compact('curso', $curso));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::all()->find($id);
        if($curso != null){
            $data = $request->all();
            $curso->update($data);
            return redirect()->route('cursos.index')
                ->with('success','ÉXITO :) '.$curso['anio'].' Curso actualizado');
        }
        // else{
        //     //poner mensaje de error 
        //     return redirect()->route('cursos.index');
        // }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::all()->find($id);
        Curso::all()->find($id)->delete();
        return redirect()->route('cursos.index')
            ->with('success','ÉXITO :) '.$curso['anio'].' Eliminado');
    }
}
