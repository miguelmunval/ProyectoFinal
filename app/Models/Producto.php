<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = "idPro";

    protected $table = "productos" ;

    public function par_pro()
    {      
        return $this->belongsToMany("App\Models\Parcela", "cuadernocampo", "idPro", "idPar")
                    ->getResults()->all();
    }
}
