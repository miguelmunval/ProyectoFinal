<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function peticionAjax(Request $req)
    {
        $peti = Cultivo::all();

        return $peti;
    }
    public function findById(Request $req, $idCult)
    {
        $peti = Cultivo::find($idCult);

        return $peti;
    }
}
