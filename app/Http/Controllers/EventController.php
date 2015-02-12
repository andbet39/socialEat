<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Event;
use Auth;

class EventController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function create()
	{
		return view('event.new');
	}

	public function save()
	{
		
		$event = new Event();
		$event->title = Request::input('title');
		$event->description = Request::input('description');

		$event->user_id = Auth::user()->id;
		$event->save();
	}

	public  function index(){


		return view('event.index');
	}



	public  function getList()
	{

		$events = Event::paginate(6);

		return $events;
	}


}
