<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;

    protected $primaryKey = "idCult";

    protected $table = "cultivos" ;

    public function par_cult()
    {      
        return $this->hasMany("App\Models\Parcela", "idPar", "idCult")
                    ->first() ;
    } 
    public function hist_par_cult()
    {      
        return $this->belongsToMany("App\Models\Parcela", "Historial_Cultivo", "idPar", "idCult")
                    ->first() ;
    } 
}
