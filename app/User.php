<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User has many events
     */
    public function events(){
        return $this->hasMany('App\Calendar');
    }

    /**
     * Count of events for user
     */
    public function eventsCount(){
        return $this->events()->count();
    }

    /**
     * User has many posts
     */
    public function posts(){
        return $this->hasMany('App\Post');
    }

    /**
     * Count of posts for user
     */
    public function postsCount(){
        return $this->posts()->count();
    }

    /**
     * User has many login logs
     */
    public function loginlogs(){
        return $this->hasMany('App\LoginLogs')->orderBY('last_login', 'DESC');
    }

    /**
     * Count of logs for user
     */
    public function loginlogsCount(){
        return $this->loginlogs()->count();
    }

    /**
     * Users has many roles
     */
    public function roles() {
        return $this->belongsToMany(Roles::class, 'roles_has_users', 'users_id', 'roles_id')->withTimestamps();
    }

    /**
     * Check the user has more roles
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check the user has role
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
