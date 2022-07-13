<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    public function group()
    {
        return $this->belongsTo('App\Group');
    }
    
    protected $fillable=[
        'title',
        'body',
        'start_time',
        'end_time',
        'where',
        'others',
        'user_id',
        'group_id',
        'google_calendar_id'
        ];
        
    public function users()
    {
          return $this->belongsToMany('App\User');
    }
}
