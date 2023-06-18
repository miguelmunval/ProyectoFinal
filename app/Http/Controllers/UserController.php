<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param Request $req
     * @return
     */
    public function listar(Request $req) 
    {       
        return view("users.main", ["datos" => User::usuario()->get() ]) ;
    }

    /**
     * @param Request $req
     * @return
     */

    public function guardar(Request $req) 
    {
        $user = new User;
        $user->nombre=$req->input('nombre');
        $user->apellido=$req->input('apellido');
        $user->email=$req->input('email');
        $user->email_verified_at=Carbon::now()->toDateTimeString();
        $user->password=Hash::make($req->input('password'));
        $user->roles=$req->input('roles');
        $user->save();
        return redirect()->route('parcela.listar');
    }

    public function actualizar(Request $req, $usuario)
    {
        $usuarioEditar=User::find($usuario);
        $usuarioEditar->nombre=$req->input('nombre');
        $usuarioEditar->apellido=$req->input('apellido');
        $usuarioEditar->email=$req->input('email');
        $usuarioEditar->password=Hash::make($req->input('password'));
        $usuarioEditar->roles=$req->input('roles');
        $usuarioEditar->update();
        return redirect()->route("user.listar") ;
    }
    public function editar(Request $req, $usuario)
    {
        $usuarioEditar=User::find($usuario);
        return view("users.editar", compact("usuarioEditar"));
    }
}
