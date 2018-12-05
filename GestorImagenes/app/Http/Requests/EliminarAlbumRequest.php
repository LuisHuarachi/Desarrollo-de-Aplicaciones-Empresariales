<?php namespace GestorImagenes\Http\Requests;
use Illuminate\Support\Facades\Auth;
use GestorImagenes\Http\Requests\Request;

class EliminarAlbumRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$user=Auth::user();
		$id=$this->get('id');
		$album=$user->albunes()->find($id);
		if ($album) {
				return true;
		}
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
				'id'=>'required|exists:albunes,id'
		];
	}

}
