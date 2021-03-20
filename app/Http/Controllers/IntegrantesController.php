<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\Clave;
use App\Models\Curso;
use App\Models\Ciclo;
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
        if (isset($_GET['tutor'])) 
        {
            $tutor = $_GET['tutor'];   
        }
       
        $integrantes = Integrante::with("cursos","ciclos")->where("tutor",$tutor)->get();
      
        return view('orla.integrantes.index')->with(['tutor'=>$tutor,'integrantes'=>$integrantes]);
       
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
        $data=$request->all();
        
        if($request->hasFile('foto')){
            $archivo = $request->file('foto');
            $nombre = $archivo->getClientOriginalName();
            $archivo->move("img/",$nombre);
            $data["foto"]=$nombre;
        }else{
            $data["foto"]="";
        }

        Integrante::create($data);
         return view('welcome');
            
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
    public function edit($integrante_id)
    {
        $integrante = Integrante::with("cursos",'ciclos')->where("id",$integrante_id)->get()->first();
        return view('orla.integrantes.edit',compact("integrante"))->with(["integrante"=>$integrante, "ciclos"=>Ciclo::all(), 'cursos'=>Curso::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $integrante_id)
    {
        $request->validate([]);
        $integrante = Integrante::all()->find($integrante_id);
        if($integrante!=null){

            $data=$request->all();
        
            if($request->hasFile('foto')){
                $archivo = $request->file('foto');
                $nombre = $archivo->getClientOriginalName();
                $archivo->move("img/",$nombre);
                $data["foto"]=$nombre;
            }else{
                $data['foto']=$integrante["foto"];
            }
            $integrante->update($request->all());
        }
        return redirect()->route('home');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function destroy($integrante_id)
    {
        Integrante::all()->find($integrante_id)->delete();
        return redirect()->route('home');
           
    }
}