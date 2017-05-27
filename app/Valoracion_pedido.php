<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion_pedido extends Model
{
    protected $table = 'valoracion_pedido';

    public function user(){
        return $this->belongsto(User::class);
    }
    public function pedido(){
        return $this->belongsto(Pedido::class);
    }


}
