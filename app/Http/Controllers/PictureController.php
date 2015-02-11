<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
 use App\Picture;
use Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class PictureController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Picture::all();

		return view('picture.index', compact('entries'));
	}

	public function add() {

		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new Picture();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;

		$entry->save();

		return $entry;

	}


	public function get($id){

		$entry = Picture::find($id)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);

		return (new Response($file, 200))
			->header('Content-Type', $entry->mime);
	}






}
