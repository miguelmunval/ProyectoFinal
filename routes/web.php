<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CuadernoCampoController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(["prefix" => "parcelas", 
              "as" => "parcela.",
              "middleware" => ["auth"]], function() 
{
    Route::get("/",         [ParcelaController::class, "listar"])->name("listar") ;
    Route::get("/crear",    [ParcelaController::class, "crear"])->name("crear") ;
    Route::post("/guardar",  [ParcelaController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idPar}", [ParcelaController::class, "borrar"])->name("borrar") ;
    Route::get("/editar/{idPar}", [ParcelaController::class, "editar"])->name("editar") ;
    Route::post("/actualizar/{idPar}", [ParcelaController::class, "actualizar"])->name("actualizar") ;
    Route::get('/historial/{idPar}', [ParcelaController::class, "Hist_Cult"])->name("Hist_Cult");
}) ;
Route::group(["prefix" => "users", 
              "as" => "user."], function() 
{
    Route::get("/",         [UserController::class, "listar"])->name("listar");
    Route::get("/trabajadores",         [UserController::class, "trabaj_disp"])->name("trabaj_disp");
    Route::post("/guardar",  [UserController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idUsu}", [UserController::class, "borrar"])->name("borrar") ;
    Route::get("/editar/{idUsu}", [UserController::class, "editar"])->name("editar") ;
    Route::post("/actualizar/{idUsu}", [UserController::class, "actualizar"])->name("actualizar") ;
});
Route::group(["prefix" => "cultivos", 
              "as" => "cultivo."], function() 
{
    Route::get("/",         [CultivoController::class, "listar"])->name("listar") ;
    Route::get("/mostrar",         [CultivoController::class, "getbyid"])->name("getbyid") ;
    Route::get("/crear",    [CultivoController::class, "crear"])->name("crear") ;
    Route::post("/guardar",  [CultivoController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idCult}", [CultivoController::class, "borrar"])->name("borrar") ;
    Route::get("/editar/{idCult}", [CultivoController::class, "editar"])->name("editar") ;
    Route::post("/actualizar/{idCult}", [CultivoController::class, "actualizar"])->name("actualizar") ;
});
Route::group(["prefix" => "objetos", 
              "as" => "objeto."], function() 
{
    Route::get("/",         [ObjetoController::class, "listar"])->name("listar") ;
    Route::get("/crear",    [ObjetoController::class, "crear"])->name("crear") ;
    Route::post("/guardar",  [ObjetoController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idObj}", [ObjetoController::class, "borrar"])->name("borrar") ;
    Route::get("/editar/{idObj}", [ObjetoController::class, "editar"])->name("editar") ;
    Route::post("/actualizar/{idObj}", [ObjetoController::class, "actualizar"])->name("actualizar") ;
});
Route::group(["prefix" => "trabajadores", 
              "as" => "trabajador."], function() 
{
    Route::get("/",         [TrabajadorController::class, "listar"])->name("listar") ;
    Route::get("/crear",    [TrabajadorController::class, "crear"])->name("crear") ;
    Route::post("/guardar",  [TrabajadorController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idTra}", [TrabajadorController::class, "borrar"])->name("borrar") ;
});
Route::group(["prefix" => "actividades", 
              "as" => "actividad."], function() 
{
    Route::get("/listar/{idUsu}",  [ActividadController::class, "listar"])->name("listar") ;
    Route::get("/crear/{idTra}", [ActividadController::class, "crear"])->name("crear") ;
    Route::post("/guardar/{idTra}", [ActividadController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idAct}", [ActividadController::class, "borrar"])->name("borrar") ;
});
Route::group(["prefix" => "cuadernodecampo", 
              "as" => "cuadernocampo."], function() 
{
    Route::get("/listar/{idPar}",  [CuadernoCampoController::class, "listar"])->name("listar");
    Route::get("/crear/{idPar}", [CuadernoCampoController::class, "crear"])->name("crear");
    Route::post("/guardar/{idPar}", [CuadernoCampoController::class, "guardar"])->name("guardar") ;
});
Route::group(["prefix" => "productos", 
              "as" => "producto."], function() 
{
    Route::get("/",         [ProductoController::class, "listar"])->name("listar") ;
    Route::get("/crear",    [ProductoController::class, "crear"])->name("crear") ;
    Route::post("/guardar",  [ProductoController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idPro}", [ProductoController::class, "borrar"])->name("borrar") ;
    Route::get("/editar/{idPro}", [ProductoController::class, "editar"])->name("editar") ;
    Route::post("/actualizar/{idPro}", [ProductoController::class, "actualizar"])->name("actualizar") ;
});
Route::group(["prefix" => "inventarios", 
              "as" => "inventario."], function() 
{
    Route::get("/",  [InventarioController::class, "listar"])->name("listar") ;
    Route::get("/crear", [InventarioController::class, "crear"])->name("crear") ;
    Route::post("/guardar", [InventarioController::class, "guardar"])->name("guardar") ;
    Route::get("/borrar/{idInv}", [InventarioController::class, "borrar"])->name("borrar") ;
});

Route::get('/peti_ajax', [AjaxController::class, "peticionAjax"])->name("peticionAjax");
Route::get('/petiById/{idCult}', [AjaxController::class, "findById"])->name("findById");
Route::get('/crops', [AjaxController::class, "getCrops"])->name("getCrops");

Route::get("locale/{lange}",[LocalizationController::class,'setLang']);

require __DIR__.'/auth.php';
