<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Inventario;
use App\Models\Objeto;
use App\Models\User;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    function listar(Request $req) {
        $inventario = DB::table('inventario')->where('idUsu', Auth::id())->get();
        $inv = DB::table('inventario')->where('idUsu', Auth::id())->pluck('idObj')->toArray();
        $ids_ordered = implode(',', $inv);
        if (!empty($inv)) {
            $objeto = [];
            foreach ($inv as $idObj) {
                $objeto[] = Objeto::where('idObj', $idObj)->first();
            }
        } else {
            $objeto = null;
        }
        return view('inventarios.main', compact('objeto', 'inventario'));
    }
    
    function crear(Request $req) {
        $objetos = Objeto::all();
    
        return view("inventarios.crear", ["datos" => $objetos]);
    }

    function guardar(Request $req) {
        $inventario = new Inventario;
        $inventario->idUsu=Auth::id();
        $inventario->idObj=$req->input('idObj');
        $inventario->Cantidad=$req->input('cant');
        $inventario->FechComp=$req->input('fecha');
        $inventario->save();
        return redirect()->route('inventario.listar');
    }

    public function borrar(Request $req, $inventario) 
    {  
        $inventarioBorrar=Inventario::find($inventario);
        $inventarioBorrar->delete();
        return redirect()->route("inventario.listar") ;
    }
}
