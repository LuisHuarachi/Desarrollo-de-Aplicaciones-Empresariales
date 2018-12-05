<?php namespace GestorImagenes\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use GestorImagenes\Http\Requests\CrearAlbumRequest;
use GestorImagenes\Http\Requests\ActualizarAlbumRequest;
use GestorImagenes\Http\Requests\EliminarAlbumRequest;
use GestorImagenes\Album;
use GestorImagenes\Fotos;

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
    return view('albunes.crear-album');
  }
  public function postCrearAlbum(CrearAlbumRequest $request){
    $usuario=Auth::user();
		Album::create(
			[
				'nombre'=>$request->get('nombre'),
				'descripcion'=>$request->get('descripcion'),
				'usuario_id'=>$usuario->id,
			]
		);
		return redirect('/validado/albunes')->with('creado','El album ha sido creado');
  }
  public function getActualizarAlbum($id){
		$album=Album::find($id);
    return view('albunes.actualizar-album',['album'=>$album]);
  }
  public function postActualizarAlbum(ActualizarAlbumRequest $request){
		$album=Album::find($request->get('id'));
		$album->nombre=$request->get('nombre');
		$album->descripcion=$request->get('descripcion');
		$album->save();
		return redirect('/validado/albunes')->with('actualizado','El album se actualizo');
  }

  public function postEliminarAlbum(EliminarAlbumRequest $request){
    		$album=Album::find($request->get('id'));
				$fotos=$album->fotos();
				foreach ($fotos as $foto) {
						$rutaanterior=getcwd().$foto->$ruta;
						if(file_exists($rutaanterior)){
							unlink(realpath($rutaanterior));
						}
						$foto->delete();
				}
				$album->delete();
			/*	$album->fotos()->delete();
				$album->delete();*/
				return redirect('/validado/albunes')->with('eliminado','El album fue eliminado');
  }
  public function missingMethod($parameters=array()){
    abort(404);
  }
}
