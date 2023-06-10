<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\Historial_CultivoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\ProfileController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::redirect("/", "login")->name("home") ;

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */

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
}) ;
Route::group(["prefix" => "users", 
              "as" => "user."], function() 
{
    Route::get("/",         [UserController::class, "listar"])->name("listar");
    Route::get("/disponibles",         [UserController::class, "trabaj_disp"])->name("trabaj_disp");
    /* Route::get("/crear",    [UserController::class, "crear"])->name("crear") ; */
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
    Route::get("/editar/{idTra}", [TrabajadorController::class, "editar"])->name("editar") ;
    Route::post("/actualizar/{idTra}", [TrabajadorController::class, "actualizar"])->name("actualizar") ;
});
Route::group(["prefix" => "peticiones", 
              "as" => "peticion."], function() 
{
    Route::get('/historial/{idPar}', [Historial_CultivoController::class, "Hist_Cult"])->name("Hist_Cult");
});

Route::get('/peti_ajax', [AjaxController::class, "peticionAjax"])->name("peticionAjax");
Route::get('/petiById/{idCult}', [AjaxController::class, "findById"])->name("findById");

require __DIR__.'/auth.php';
