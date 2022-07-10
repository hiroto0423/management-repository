<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Event;
use App\Group;
use App\User;
use Spatie\GoogleCalendar\Event as Google_event;
use Carbon\Carbon;




class EventController extends Controller
{

    public function index(Event $event)
    {
        return view('events/index')->with(['events'=>$event->get()]);
    }
    
    public function show(Event $event,Group $group,User $user)
    {
        //dd($event->users);
        return view('events/show',compact('event','group','user'));
    }
    
    public function create(Event $event,User $user)
    {
        //多対多のリレーション（groups,users)
        return view('events/create',compact('event'))->with(['groups'=>\Auth::user()->groups]);
    }
    public function store(Request $request,Event $event)
    {
        
        $input=$request['event'];
        $start_time = new Carbon($input["start_time"]);
        $end_time = new Carbon($input["end_time"]);
        $google_event = new Google_event;
        $google_event->name = $input["title"];
        $google_event->startDateTime = $start_time;
        $google_event->endDateTime = $end_time;   
        $google_event->description = $input["body"];
        $new_event = $google_event->save();
        $event->fill($input)
        ->fill(['google_calendar_id' => $new_event->id])
        ->save();
        return redirect('/top');
    }
    
    public function edit(Event $event,User $user)
    {
        return view('events/edit',compact('event',))->with(['groups'=>\Auth::user()->groups]);
    }
    
    public function update(Request $request, Event $event)
    {
        $input=$request['event'];
        $event->fill($input)->save();
        $start_time = new Carbon($input["start_time"]);
        $end_time = new Carbon($input["end_time"]);
        $google_events= Google_event::get();
        $google_event = Google_event::find($event->google_calendar_id);
        $google_event->name = $input["title"];
        $google_event->startDateTime = $start_time;
        $google_event->endDateTime = $end_time;   
        $google_event->description = $input["body"];
        $new_event = $google_event->save();
        return redirect('/top/event/'.$event->id);
    }
 

    
    
}
