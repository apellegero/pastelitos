<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_producto extends Model
{
     protected $table = 'linea_producto';

    public function pedido(){
    	return $this->belongsto(Pedido::class);
    }
}
