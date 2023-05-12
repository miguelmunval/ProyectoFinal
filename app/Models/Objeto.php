<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;

    protected $primaryKey = "idObj";

    protected $table = "objetos" ;

    public $timestamps = false ;

    public function user_obj()
    {      
        return $this->belongsToMany("App\Models\User", "Inventario", "idObj", "idUsu")
                    ->first() ;
    } 

    public function scopeUsuario($query) {
        return $query->where('idUsu', auth()->user()->idUsu);
    }
}
