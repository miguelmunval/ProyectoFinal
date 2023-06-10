<?php

namespace App\Http\Controllers;

use App\Models\Parcela;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParcelaController extends Controller
{
    /**
     * @param Request $req
     * @return
     */
    public function listar(Request $req) 
    {   
        $parcelas = Parcela::usuario()->paginate(6);
        return view("parcelas.main", ["datos" =>  $parcelas]);
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
        $parcelaEditar->locPar=$req->input('locPar');
        $parcelaEditar->tamPar=$req->input('tamPar');
        $parcelaEditar->idCult=$req->input('idCult');

        $parcelaEditar->update();
        return redirect()->route("parcela.listar") ;
    }
    public function editar(Request $req, $parcela)
    {
        $parcelaEditar=Parcela::find($parcela);
        return view("parcelas.editar", compact("parcelaEditar"));
    }
}
