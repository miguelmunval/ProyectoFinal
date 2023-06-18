<?php

namespace App\Http\Controllers;

use App\Models\Parcela;
use Illuminate\Support\Facades\DB;
use App\Models\Historial_Cultivo;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParcelaController extends Controller
{
    /**
     * @param Request $req
     * @return
     */
    public function listar(Request $req) 
    {   
        $parcelas = Parcela::usuario()->paginate(4);
        if ($parcelas->isEmpty()) {
            return view("parcelas.main")->with('datos', null);
        }
        return view("parcelas.main", ["datos" =>  $parcelas]);
    }

    /**
     * @param Request $req
     * @return
     */
    public function Hist_Cult(Request $req, $idPar)
    {
        $parcela = Parcela::find($idPar);
        $hist= DB::table('historial_cultivo')->where('idPar', $idPar)->get();
        $cultivos = $parcela->hist_cult;
        return view('parcelas.hist_Cult', compact('parcela', 'cultivos', 'hist'));
    }

    /**
     * @param Request $req
     * @return
     */
    public function crear(Request $req) 
    {
        return view("parcelas.crear");
    }

    public function guardar(Request $req) 
    {
        $parcela = new Parcela;
        $parcela->idUsu=auth()->user()->idUsu;
        $parcela->locPar=$req->input('locPar');
        $parcela->tamPar=$req->input('tamPar');
        $parcela->idCult=$req->input('idCult');

        $parcela->save();
        return redirect()->route('parcela.listar');
    }
    /**
     * @param Request $req
     * @return
     */
    public function borrar(Request $req, $parcela) 
    {  
        $parcelaBorrar=Parcela::find($parcela);
        $parcelaBorrar->delete() ;
        return redirect()->route("parcela.listar") ;
        
    }
    public function actualizar(Request $req, $parcela)
    {
        $parcelaEditar=Parcela::find($parcela);
        $hist = new Historial_Cultivo;
        $hist->idPar = $parcela;
        $hist->idCult = $parcelaEditar->idCult;
        $hist->fechaCult = Carbon::today();
        $parcelaEditar->locPar=$req->input('locPar');
        $parcelaEditar->tamPar=$req->input('tamPar');
        $parcelaEditar->idCult=$req->input('idCult');

        $parcelaEditar->update();
        $hist->save();
        return redirect()->route("parcela.listar") ;
    }
    public function editar(Request $req, $parcela)
    {
        $parcelaEditar=Parcela::find($parcela);
        return view("parcelas.editar", compact("parcelaEditar"));
    }
}
