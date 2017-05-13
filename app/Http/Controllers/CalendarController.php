<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar;
use Auth;
use Session;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Calendar::where('user_id', Auth::user()->id)->orderBY('end_time', 'DSC')->get();
        return view('calendar.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = \Carbon\Carbon::now(); // Current date and time
        return view('calendar.create', compact('now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:25', 
            'description' => 'required|max:100', 
            'start_time' => 'required|date|date_format:Y-m-d H:i:s|before:end_time',
            'end_time' => 'required|date|date_format:Y-m-d H:i:s|after:start_time'
            ]);

        $event = new Calendar($request->all());
        $event->user_id = Auth::user()->id;
        $event->save();

        Session::flash('message', 'Wydarzenie zostało dodane');

        return redirect('/calendar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Calendar::findOrFail($id);
        $event->delete();

        Session::flash('message', 'Wydarzenie zostało usunięty');

        return redirect('/calendar');
    }
}
