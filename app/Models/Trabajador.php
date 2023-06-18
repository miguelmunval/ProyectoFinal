<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $primaryKey = "idTra";

    protected $table = "trabajadores" ;

    public $timestamps = false ;

    public function par_tra()
    {      
        return $this->belongsToMany("App\Models\Parcela", "actividades", "idTra", "idPar")
                    ->getResults()->all();
    }

    public function user_tra()
    {      
        return $this->belongsTo("App\Models\User", "idTra", "idUsu")
                    ->first() ;
    }
    
    public function scopeUsuario($query) {
        return $query->where('jefe', auth()->user()->idUsu);
    }
}
