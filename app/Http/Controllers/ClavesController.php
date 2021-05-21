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
        
        if (isset($_GET['tutor'])) 
        {
            $tutor = $_GET['tutor']; 
            $claves = Clave::with("cursos","ciclos")->where("tutor",$tutor)->get();
            return view('orla.tutores.claves.index',compact('claves',$claves));
        }
        
        
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
        return redirect()->route('home')
            ->with('success',$data['clave'].' Creada exitoxamente :)');
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
    public function edit($clave_id)
    {
        $clave = Clave::with("cursos","ciclos")->where("id",$clave_id)->get()->first();
        return view('orla.tutores.claves.edit',compact("clave",$clave))->with(["clave"=>$clave,"cursos"=>Curso::all(),"ciclos"=>Ciclo::all()]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clave  $clave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clave_id)
    {
        $clave = Clave::all()->find($clave_id);
        if($clave != null){
            $data = $request->all();
            $clave->update($data);
        }
        return redirect()->route('home')
            ->with('success',$data['clave'].' Modificado exitoxamente :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clave  $clave
     * @return \Illuminate\Http\Response
     */
    public function destroy($clave_id)
    {
        $clave = Clave::all()->find($clave_id);
        Clave::all()->find($clave_id)->delete();
        return redirect()->route('home')
            ->with('success','La clave: '.$clave['clave'].', ha sido eliminado exitosamente');
    }
}
