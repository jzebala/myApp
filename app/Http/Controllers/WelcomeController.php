<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar;
use Auth;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Calendar::latest()->get();
        
        $eventtoday = 0; // Number of today's events.
        foreach($events as $event){
            if($event->eventToDay() && $event->user_id == Auth::user()->id){
                $eventtoday++;
            }
        }
        return view('welcome', compact('eventtoday'));
    }

}
