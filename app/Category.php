<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /*
        Category has many posts.
    */
    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
