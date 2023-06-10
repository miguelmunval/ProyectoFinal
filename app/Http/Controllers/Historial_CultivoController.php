<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use App\Models\Parcela;
use App\Models\Historial_Cultivo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Historial_CultivoController extends Controller
{
    public function Hist_Cult(Request $req, $idPar)
    {
        $parcela = Historial_Cultivo::find($idPar);
        return view('parcelas.hist_Cult', compact('parcela', 'cultivo'));
    }
}
