<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogConfig extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'image', 'color', 'pagination'];
}
