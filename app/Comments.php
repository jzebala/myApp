<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Comments extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    /**
     * The comment has one author
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Time added post
     *
     * @return integer
    */
    public function commentTime(){
        Carbon::setLocale(config('app.locale')); // Localization PL - Poland
        $timestamp = $this->created_at;
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Europe/Warsaw');
        return $date->diffForHumans();
    }
}
