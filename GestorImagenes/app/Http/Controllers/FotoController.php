<?php namespace GestorImagenes\Http\Controllers;

use GestorImagenes\Album;
use GestorImagenes\Foto;
use GestorImagenes\Http\Requests\MostrarFotosRequest;

class FotoController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 *
	 */
	public function getIndex(MostrarFotosRequest $request)
	{
		$id=$request->get('id');
		$album=Album::find($id);
		$fotos=$album->fotos;
		return view('Fotos.mostrar',['fotos'=>$fotos]);
	}



  public function getCrearFoto(){
    return 'Formulario de crear fotos';
  }
  public function postCrearFoto(){
    return 'Almacenado foto';
  }
  public function getActualizarFoto(){
    return 'Formulario de Actualizar Fotos';
  }
  public function postActualizarFoto(){
    return 'Actualizar Foto';
  }
  public function getEliminarFoto(){
    return 'Formulario de Eliminar Fotos';
  }
  public function postEliminarFoto(){
    return 'Eliminando Foto';
  }
  public function missingMethod($parameters=array()){
    abort(404);
  }
}
