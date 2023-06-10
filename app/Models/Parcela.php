<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;

    protected $primaryKey = "idPar";

    protected $table = "parcelas" ;

    public $timestamps = false ;

    protected $fillable = [ "idUsu", "idCult", "locPar", "tamPar" ] ;

    public function user_par()
    {      
        return $this->belongsTo("App\Models\User", "idPar", "idUsu")
                    ->first() ;
    } 
    public function cult_par()
    {      
        return $this->belongsTo("App\Models\Cultivo", "idPar", "idCult")
                    ->first() ;
    }
    
    public function hist_cult_par()
    {      
        return $this->belongsToMany("App\Models\Cultivo", "historial_cultivo", "idPar", "idCult")
                    ->getResults()->all() ;
    } 

    public function tra_par()
    {      
        return $this->belongsToMany("App\Models\Trabajador", "actividades", "idPar", "idTra")
                    ->getResults()->all();
    }

    public function pro_par()
    {      
        return $this->belongsToMany("App\Models\Producto", "cuadernocampo", "idPar", "idPro")
                    ->getResults()->all();
    }

    public function getRouteKeyName() 
    {
        return "email" ;
    }

    public function scopeUsuario($query) {
        return $query->where('idUsu', auth()->user()->idUsu);
    }
}
?>