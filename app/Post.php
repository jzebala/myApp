<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
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
        'title', 'contents', 'publish', 'image'
    ];

    /**
     * The post has one author
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Post has many categories
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    /**
     * Check that the post has a category
     */
    public function hasCategory($category){
        if($this->categories()->where('name', $category)->first()){
            return true;
        }
        return false;
    }

    /**
     * Category id from post
     */
    public function getCategoryListAttribute()
    {
        return $this->categories->pluck('id')->all();
    }
}
