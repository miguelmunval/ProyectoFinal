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
        return view("parcelas.main", ["datos" => Parcela::usuario()->get() ]) ;
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
        $parcela->locTer=$req->input('locTer');
        $parcela->tamTer=$req->input('tamTer');
        $parcela->semTer=$req->input('semTer');

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
        $parcelaEditar->locTer=$req->input('locTer');
        $parcelaEditar->tamTer=$req->input('tamTer');
        $parcelaEditar->semTer=$req->input('semTer');

        $parcelaEditar->update();
        return redirect()->route("parcela.listar") ;
    }
    public function editar(Request $req, $parcela)
    {
        $parcelaEditar=Parcela::find($parcela);
        return view("parcelas.editar", compact("parcelaEditar"));
    }
}
