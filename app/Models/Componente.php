<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    use HasFactory;
    protected $table = 'componente';

    public function tipoComponente(){
        return $this->belongsTo('App\Models\TipoComponente', 'idTipo_componente');
    }
    
    public function componentes_sucursales(){
        return $this->hasMany('App\Models\Componente_Sucursal');
    }
}
