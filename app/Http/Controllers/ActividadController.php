<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Trabajador;
use App\Models\Actividad;
use App\Models\User;
use App\Models\Parcela;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    function listar(Request $req, $idUsu) {
        $idTra = Trabajador::where('idUsu', $idUsu)->pluck('idTra')->first();
        $actividad = DB::table('actividades')->where('idTra', $idTra)->get();
        $act = DB::table('actividades')->where('idTra', $idTra)->pluck('idPar')->toArray();
        $ids_ordered = implode(',', $act);
        if (!empty($act)) {
            $parcela = [];
            foreach ($act as $idPar) {
                $parcela[] = Parcela::where('idPar', $idPar)->first();
            }
        } else {
            $parcela = null;
        }
        return view('actividades.main', compact('parcela', 'actividad', 'idUsu'));
    }
    
    function crear(Request $req, $idUsu) {
        $parcelas = DB::table('parcelas')->where('idUsu', Auth::id())->get();
    
        return view("actividades.crear", compact('parcelas', 'idUsu'));
    }

    function guardar(Request $req, $idUsu) {
        $actividad = new Actividad;
        $actividad->idPar=$req->input('idPar');
        $idTra = Trabajador::where('idUsu', $idUsu)->pluck('idTra')->first();
        $actividad->idTra=$idTra;
        $actividad->desAct=$req->input('desAct');
        $actividad->save();
        return redirect()->route('actividad.listar', $idUsu);
    }

    public function borrar(Request $req, $actividad) 
    {  
        dd($actividad);
        $actividadBorrar=Actividad::find($actividad);
        $idTra = DB::table('actividades')->where('idAct', $actividad)->value('idTra');
        $idUsu = Trabajador::where('idTra', $idTra)->pluck('idUsu')->first();
        $actividadBorrar->delete();
        return redirect()->route("actividad.listar", $idUsu) ;
    }
}
