<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursal';

    public function componentes_sucursales(){
        return $this->hasMany('App\Models\Componente_Sucursal');
    }
}