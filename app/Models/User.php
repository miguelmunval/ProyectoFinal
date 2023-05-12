<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;


    protected $primaryKey = "idUsu";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
    ];

    public function parcela()
    {
        return $this->hasMany('App\Models\Parcela', 'idPar', 'idUsu');
    }

    public function tra_user()
    {      
        return $this->belongsTo("App\Models\Trabajador", "idTra", "idUsu")
                    ->first() ;
    } 

    public function obj_user()
    {      
        return $this->belongsToMany("App\Models\Objeto", "Inventario", "idUsu", "idObj")
                    ->first() ;
    } 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function __toString(): String 
    {
        return "{$this->nombre} {$this->apellido}" ;
    }
    public function scopeUsuario($query) {
        return $query->where('idUsu', auth()->user()->idUsu);
    }
}
