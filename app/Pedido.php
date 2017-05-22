<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    public function cliente(){
    	return $this->belongsto(Cliente::class);
    }
    public function tienda(){
    	return $this->belongsto(Tienda::class);
    }
    public function repartidor(){
    	return $this->belongsto(Repartidor::class);
    }
}
