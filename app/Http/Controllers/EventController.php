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
	public function detail (){


		$event = Event::with('partecipants')->with('user')->findOrFail(Request::input('id'));

  		return $event;//view('event.detail',['event'=>$event]);

	}

	public function partecipate (){


		$event = Event::with('partecipants')->with('user')->findOrFail(Request::input('id'));
		$event->partecipants()->attach(Auth::User());

		return $event;//view('event.detail',['event'=>$event]);

	}

	public  function getList()
	{

		$events = Event::with('partecipants')->with('user')->paginate(2);

		return $events;
	}


}
