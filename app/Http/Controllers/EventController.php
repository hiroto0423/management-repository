<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Group;
use App\User;

class EventController extends Controller
{
    public function index(Event $event)
    {
        return view('events/index')->with(['events'=>$event->get()]);
    }
    
    public function show(Event $event,Group $group)
    {
        return view('events/show',compact('event','group'));
    }
    
    public function create(Event $event,User $user)
    {
        //多対多のリレーション（groups,users)
        return view('events/create',compact('event'))->with(['groups'=>\Auth::user()->groups]);
    }
    
    public function store(Request $request,Event $event)
    {
        $input=$request['event'];
        $event->fill($input)->save();
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
        return redirect('/top/event/'.$event->id);
    }
}
