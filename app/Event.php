<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
        
    public function user()
    {
          return $this->belongsTo('App\User');
    }
}
