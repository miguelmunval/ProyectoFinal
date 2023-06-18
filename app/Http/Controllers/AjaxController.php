<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
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

    public function getCrops(Request $request)
    {
        $number = random_int(0, 15);
        $url = 'https://www.growstuff.org/crops/'.$number.'.json';
        $response = Http::get($url);
        $data = $response->json();

        // Procesa y ajusta los datos según tus necesidades

        return view("cultivos.crear", ['data' => $data]);
    }
}
