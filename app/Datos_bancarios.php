<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_bancarios extends Model
{
     protected $table = 'datos_bancarios';

    public function pedido(){
    	return $this->belongsto(Pedido::class);
    }
}
