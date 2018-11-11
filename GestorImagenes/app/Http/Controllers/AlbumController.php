<?php namespace GestorImagenes\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex(){
		$usuario=Auth::user();
		$albunes=$usuario->albunes;
		return view('albunes.mostrar',['albunes'=>$albunes]);
	}



  public function getCrearAlbum(){
    return 'Formulario de crear Album';
  }
  public function postCrearAlbum(){
    return 'Almacenado Album';
  }
  public function getActualizarAlbum(){
    return 'Formulario de Actualizar Album';
  }
  public function postActualizarAlbum(){
    return 'Actualizar Album';
  }
  public function getEliminarAlbum(){
    return 'Formulario de Eliminar Album';
  }
  public function postEliminarAlbum(){
    return 'Eliminando Album';
  }
  public function missingMethod($parameters=array()){
    abort(404);
  }
}
