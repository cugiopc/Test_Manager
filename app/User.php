<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function tasks(){
        return $this->hasMany(Task::class); 
    }
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class); 
    }

    public function testplans(){
        return $this->hasMany(Testplan::class); 
    }

    public function testcases(){
        return $this->hasMany(Testcase::class); 
    }
}
