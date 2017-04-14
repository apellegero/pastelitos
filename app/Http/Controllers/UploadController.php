<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use App\Tienda;
use \Input as Input;

class UploadController extends Controller{
	public function upload(){
		if(Input::hasFile('foto')){
			$file = Input::file('foto');
			$file->move('uploads', $file->getClientOriginalName());
			echo '<img src="uploads/' .$file->getClientOriginalName().'"/">';
		}
	}
}