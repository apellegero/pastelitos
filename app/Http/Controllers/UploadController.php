<?php

namespace App\Http\Controllers;
use Illuminate\View\FileViewFinder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Producto;
use \Input as Input;
use Image;

class UploadController extends Controller{
	public function upload(Request $request){
		if($request->hasFile('foto')){
			$foto = $request->file('foto');
			$filename = time().'.'.$foto->getClientOriginalExtension();
			Image::make($foto)->resize(300, 300)->save(public_path('uploads/avatars/' .$filename));
			$user = Auth::user();
			$user->foto = $filename;
			$user->save();
			if(isset($request['from'])){
				return view($request['from']);
			}
			else{
				return view('welcome'); // al poner aqui una / peta
			}
		}
	}
	public function uploadproducto(Request $request){
		if($request->hasFile('foto')){
			$id = $request['id'];
			$foto = $request->file('foto');
			$filename = time().'.'.$foto->getClientOriginalExtension();
			Image::make($foto)->resize(300, 300)->save(public_path('uploads/products/' .$filename));
			$producto = DB::table('producto')->where('id', '=', $id)->update(array('foto' => $filename));
			if(isset($request['from'])){
				return view($request['from']);
			}
			else{
				return Redirect::back();
			}
		}
	}
}