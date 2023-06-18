<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * @param Request $req
     * @return
     */
    public function listar(Request $req) 
    {   
        $productos = Producto::paginate(4);
        return view("productos.main", ["datos" => $productos]);
    }

    /**
     * @param Request $req
     * @return
     */
    public function crear(Request $req) 
    {
        return view("productos.crear");
    }

    /**
     * @param Request $req
     * @return
     */
    public function guardar(Request $req) 
    {
        $producto = new Producto;
        $producto->nomPro=$req->input('nomPro');
        $producto->Precio=$req->input('Precio');

        $producto->save();
        return redirect()->route('producto.listar');
    }
    /**
     * @param Request $req
     * @return
     */
    public function borrar(Request $req, $producto) 
    {  
        $productoBorrar=Producto::find($producto);
        $productoBorrar->delete() ;
        return redirect()->route("producto.listar") ;
        
    }
    public function actualizar(Request $req, $producto)
    {
        $productoEditar=Producto::find($producto);
        $productoEditar->nomPro=$req->input('nomPro');
        $productoEditar->Precio=$req->input('Precio');

        $productoEditar->update();
        return redirect()->route("producto.listar") ;
    }
    public function editar(Request $req, $producto)
    {
        $productoEditar=Producto::find($producto);
        return view("productos.editar", compact("productoEditar"));
    }
}
