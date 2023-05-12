<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CultivoController extends Controller
{

    /**
     * @param Request $req
     * @return
     */
    public function listar(Request $req) 
    {   
        return view("cultivos.main", ["datos" => Cultivo::all() ]) ;
    }

    /**
     * @param Request $req
     * @return
     */
    public function crear(Request $req) 
    {
        return view("cultivos.crear");
    }

    /**
     * @param Request $req
     * @return
     */
    public function guardar(Request $req) 
    {
        $cultivo = new Cultivo;
        $cultivo->NomCult=$req->input('NomCult');
        $cultivo->DesCult=$req->input('DesCult');
        $cultivo->EstSiem=$req->input('EstSiem');
        $cultivo->EstCos=$req->input('EstCos');
        $cultivo->ZonaCult=$req->input('ZonaCult');

        $cultivo->save();
        return redirect()->route('cultivo.listar');
    }
    /**
     * @param Request $req
     * @return
     */
    public function borrar(Request $req, $cultivo) 
    {  
        $cultivoBorrar=Cultivo::find($cultivo);
        $cultivoBorrar->delete() ;
        return redirect()->route("cultivo.listar") ;
        
    }
    public function actualizar(Request $req, $cultivo)
    {
        $cultivoEditar=Cultivo::find($cultivo);
        $cultivoEditar->NomCult=$req->input('NomCult');
        $cultivoEditar->DesCult=$req->input('DesCult');
        $cultivoEditar->EstSiem=$req->input('EstSiem');
        $cultivoEditar->EstCos=$req->input('EstCos');
        $cultivoEditar->ZonaCult=$req->input('ZonaCult');

        $cultivoEditar->update();
        return redirect()->route("cultivo.listar") ;
    }
    public function editar(Request $req, $cultivo)
    {
        $cultivoEditar=Cultivo::find($cultivo);
        return view("cultivos.editar", compact("cultivoEditar"));
    }
}
