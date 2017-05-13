<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginLogs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'last_login', 'user_agent', 'ip_address'
    ];
}
