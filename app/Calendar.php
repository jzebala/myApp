<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Calendar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'start_time', 'end_time'];

    /*
    * The event has one author.
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Number of today's events.
     *
     * @return boolean
    */
    public function eventToDay(){
        $date = new Carbon($this->end_time);
        $end_time = Carbon::createFromDate($date->year, $date->month, $date->day, 'Europe/Warsaw');

        if($end_time->diffInDays() == 0){
            return true; // Event is today
        }
    }

    /**
     * Number of days to the end event.
     *
     * @return integer
    */
    public function eventTime(){

        /*
        * Variable end_time is not required
        * So if variable is not exist return 0 (days).
        */
        if($this->end_time == null) return 0;

        /*
        * Event time
        */
        Carbon::setLocale(config('app.locale')); // Localization PL - Poland
        $timestamp = $this->end_time;
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Europe/Warsaw');
        return $date->diffForHumans();
    }
}
