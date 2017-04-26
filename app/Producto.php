<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function user(){
    	return $this->belongsto(User::class);
    }
    public function categoria(){
    	return $this->belongsto(Categoria::class);
    }
}
