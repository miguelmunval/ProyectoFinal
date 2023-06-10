<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function listar(Request $req) 
    {   
        $trabajadores = Trabajador::usuario()->paginate(6);
        return view("trabajadores.main", ["datos" =>  $trabajadores]);
    }

    public function crear(Request $req) 
    {
        $trabajadores = DB::table('trabajadores')->select('idUsu')->get();
        $noTrabajan = User::whereNotIn('idUsu', function ($query){
            $query->select('idUsu')
                ->from('trabajadores');
        })->get();
        return view("trabajadores.crear", ["datos" => $noTrabajan ]);
    }
    public function guardar(Request $req) 
    {
        $user->idUsu=auth()->user()->idUsu;

        $user->save();
        return redirect()->route('trabajador.listar');
    }
    public function borrar(Request $req, $trabajador) 
    {  
        $trabajadorBorrar=Trabajador::find($trabajador);
        $trabajadorBorrar->delete();
        return redirect()->route("trabajador.listar") ;
    }
    public function actualizar(Request $req, $trabajador)
    {
        $trabajadorEditar=Trabajador::find($trabajador);
        $trabajadorEditar->idUsu=$req->input('idUsu');

        $trabajadorEditar->update();
        return redirect()->route("trabajador.listar") ;
    }
    public function editar(Request $req, $trabajador)
    {
        $trabajadorEditar=Trabajador::find($trabajador);
        return view("trabajadores.editar", compact("trabajadorEditar"));
    }
}
