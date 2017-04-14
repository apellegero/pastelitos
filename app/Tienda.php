<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tienda';

    public function user(){
    	return $this->belongsto(User::class);
    }


    
}