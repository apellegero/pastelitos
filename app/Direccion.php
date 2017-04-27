<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';

    public function user(){
    	return $this->belongsto(User::class);
    }
}
