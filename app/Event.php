<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public static function store($data){
    	$event = new Event;
    	$event->event = $data['title']; 	
    	$event->save();
    	return $event;
    }
}
