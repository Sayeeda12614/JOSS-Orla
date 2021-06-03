<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Use_;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        //Coger datos de usuarios desde el modelo  user
        $users = User::latest()->where('tipo','tutor')->paginate(7);
        //preparar la vista 
        return view('orla.admin.usuarios.index')->with('users',$users);
    }

    public function edit($id){
        $usuario = User::all()->find($id);
        return view('orla.usuarios.edit',compact('usuario',$usuario));
    }
    
    public function show($id){

        $usuario = User::all()->find($id);
        return view('orla.usuarios.show',compact('usuario',$usuario));
    }

    public function update(Request $request, $id){

        $usuario = User::all()->find($id);
        if($usuario){
            $data = $request->all();

            if($request->hasFile('foto')){
                $archivo = $request->file('foto');
                $nombre = $usuario->name.'_'.$archivo->getClientOriginalName();
                $archivo->move('assets/Fotos_usuarios/',$nombre);
                $data['foto'] = $nombre;
            }else{
                $data['foto']="";
            }
            $usuario->update($data);
        }

        return redirect()->route('usuarios.show',$id)
            ->with('success','ÉXITO :) Perfil actualizado');

    }
    public function destroy($id)
    {
        
        try {

            $user = User::all()->find($id);
            User::all()->find($id)->delete();
            return redirect()->route('usuarios.index')
                ->with('success','ÉXITO :) '.$user['name'].' Eliminado');
        
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('usuarios.index')
            ->with('error','FALLO :(  No se puede eliminar este usuario');
        }
    }
}

