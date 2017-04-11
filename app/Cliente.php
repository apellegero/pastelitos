<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';//per cambiar el nom

    public function user(){
    	return $this->belongsto(User::class);
    }


    
}
