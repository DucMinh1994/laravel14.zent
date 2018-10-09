<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index(){
    	$events = Event::all();

    	return view('event.index',['events' => $events]);
    }

    public function create(){
    	return view('event.create');
    }

    public function store(Request $request){
    	Event::store($request->all());

    	return redirect('events');
    }
}
