<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuadernoCampo extends Model
{
    use HasFactory;

    protected $primaryKey = ['idPar', 'idPro'];
    public $incrementing = false;

    protected $table = "cuadernocampo" ;
}
