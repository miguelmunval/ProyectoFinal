<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Trabajador;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function listar(Request $req) 
    {   
        $trabajadores = Trabajador::usuario()->paginate(4);
        $usuarioIds = $trabajadores->pluck('idUsu')->toArray();
        $usuarios = User::whereIn('idUsu', $usuarioIds)->paginate(4);
        return view("trabajadores.main", compact('usuarios', 'trabajadores'));
    }

    public function crear(Request $req) 
    {
        $noTrabajan = User::whereNotIn('idUsu', function ($query){
            $query->select('idUsu')
                ->from('trabajadores');
        })->get();
        return view("trabajadores.crear", ["datos" => $noTrabajan ]);
    }

    public function guardar(Request $req) 
    {
        $user = new Trabajador;
        $user->idUsu=$req->input('usuario');
        $user->jefe=Auth::id();
        $user->save();
        return redirect()->route('trabajador.listar');
    }

    public function borrar(Request $req, $trabajador) 
    {  
        $trabajadorBorrar=Trabajador::find($trabajador);
        $trabajadorBorrar->delete();
        return redirect()->route("trabajador.listar") ;
    }
}
