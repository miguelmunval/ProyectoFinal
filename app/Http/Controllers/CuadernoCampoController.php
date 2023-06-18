<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CuadernoCampo;
use App\Models\Trabajador;
use App\Models\Producto;
use App\Models\Parcela;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuadernoCampoController extends Controller
{
    public function listar(Request $req, $idPar) 
    {   
        $datos = DB::table('cuadernocampo')->where('idPar', $idPar)->get();
        $productos = $datos->pluck('idPro')->toArray();
        $trabajadores = $datos->pluck('idTra')->toArray();
        $parcela = Parcela::where('idPar', $idPar)->pluck('locPar')->toArray();
        $productos = Producto::whereIn('idPro', $productos)->paginate(4);
        $usuarios = [];
        foreach ($trabajadores as $trabajador) {
            $usuario = Trabajador::where('idTra', $trabajador)->pluck('idUsu')->first();
            $usuarios[] = User::where('idUsu', $usuario)->pluck('nombre')->first();
        }
        if ($datos->isEmpty()) {
            return view("cuadernos.main")->with(['productos' => null, 'idPar' => $idPar]);
        }
        return view("cuadernos.main", compact('parcela', 'productos', 'usuarios', 'datos', 'idPar'));
    }
    
    public function crear(Request $req, $idPar) 
    {
        $productos =  Producto::all();
        $idsTra = Trabajador::where('jefe', Auth::id())->pluck('idTra')->toArray();
        $trabajadores = Trabajador::where('jefe', Auth::id())->pluck('idUsu')->toArray();
        $usuarios = User::whereIn('idUsu', $trabajadores)->pluck('nombre')->toArray();
        return view("cuadernos.crear", compact('productos', 'usuarios', 'idsTra', 'idPar'));
    }

    function guardar(Request $req, $idPar) {
        $cuadernocampo = new CuadernoCampo;
        $cuadernocampo->idPar=$idPar;
        $cuadernocampo->idPro=$req->input('pro');
        $cuadernocampo->idTra=$req->input('trab');
        $cuadernocampo->fechafitosanitario=$req->input('fechafit');
        $cuadernocampo->save();
        return redirect()->route('cuadernocampo.listar', $idPar);
    }

}
