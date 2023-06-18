<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    /**
     * @param Request $req
     * @return
     */
    public function listar(Request $req) 
    {   
        $objetos = Objeto::paginate(4);
        return view("objetos.main", ["datos" => $objetos]);
    }

    /**
     * @param Request $req
     * @return
     */
    public function crear(Request $req) 
    {
        return view("objetos.crear");
    }

    /**
     * @param Request $req
     * @return
     */
    public function guardar(Request $req) 
    {
        $objeto = new Objeto;
        $objeto->NomObj=$req->input('NomObj');
        $objeto->DesObj=$req->input('DesObj');
        $objeto->Precio=$req->input('Precio');

        $objeto->save();
        return redirect()->route('objeto.listar');
    }
    /**
     * @param Request $req
     * @return
     */
    public function borrar(Request $req, $objeto) 
    {  
        $objetoBorrar=Objeto::find($objeto);
        $objetoBorrar->delete() ;
        return redirect()->route("objeto.listar") ;
        
    }
    public function actualizar(Request $req, $objeto)
    {
        $objetoEditar=Objeto::find($objeto);
        $objetoEditar->NomObj=$req->input('NomObj');
        $objetoEditar->DesObj=$req->input('DesObj');
        $objetoEditar->Precio=$req->input('Precio');

        $objetoEditar->update();
        return redirect()->route("objeto.listar") ;
    }
    public function editar(Request $req, $objeto)
    {
        $objetoEditar=Objeto::find($objeto);
        return view("objetos.editar", compact("objetoEditar"));
    }
}
