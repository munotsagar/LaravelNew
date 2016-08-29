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
        'name', 'email', 'password', 'username',
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
     * A user can have many articles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function isATeamManager()
    {
        return true;
    }

    public function blog()
    {
        return $this->hasMany('App\Blog');
    }

   /* public function setPasswordAttribute($password)
    {
        $this->attributes['password']   =   bcrypt($password);
    }*/
}
