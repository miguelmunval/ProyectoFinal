<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_Cultivo extends Model
{
    use HasFactory;

    protected $primaryKey = 'idHist';

    protected $table = "historial_cultivo" ;
}
