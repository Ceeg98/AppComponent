<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComponente extends Model
{
    use HasFactory;
    protected $table = 'tipo_componente';

    public function componentes(){
        return $this->hasMany('App\Models\Componente');
    }
}
