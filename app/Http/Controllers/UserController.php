<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Use_;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        //Coger datos de usuarios desde el modelo  user
        $users = User::all();
        //preparar la vista 
        return view('orla.admin.usuarios.index',compact('users',$users));
    }
    public function destroy($id)
    {
        $curso = User::all()->find($id);
        User::all()->find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}

