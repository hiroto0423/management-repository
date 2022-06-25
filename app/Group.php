<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Group extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
        'goal',
    ];
    
    public function events()
    {
        return $this->hasMany('App\Event');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

