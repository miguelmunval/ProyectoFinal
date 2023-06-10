<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param Request $req
     * @return
     */
    public function listar(Request $req) 
    {       
        return view("users.main", ["datos" => User::usuario()->get() ]) ;
    }

    /* public function trabaj_disp(Request $req)
    {
        return ["datos", DB::table('users')->select(...)->whereNotIn('idUsu',DB::table('trabajadores')->select('idUsu')->get())->get()];
    } */

    /**
     * @param Request $req
     * @return
     */

    public function guardar(Request $req) 
    {
        $user = new User;
        $user->nomUsu=$req->input('nomUsu');
        $user->nombre=$req->input('nombre');
        $user->apellido=$req->input('apellido');
        $user->email=$req->input('email');
        $user->email_verified_at=Carbon::now()->toDateTimeString();
        $user->password=Hash::make($req->input('password'));
        $user->save();
        return redirect()->route('parcela.listar');
    }

    /**
     * @param Request $req
     * @return
     */
    /* public function borrar(Request $req, User $user) 
    {  
        
        $user->delete() ;
        return redirect()->route("user.listar") ;
        
    } */
}
