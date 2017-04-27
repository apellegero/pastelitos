<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    protected $table = 'repartidor';

    public function user(){
    	return $this->belongsto(User::class);
    }
     public function tienda(){
    	return $this->belongsto(tienda::class);
    }
}
