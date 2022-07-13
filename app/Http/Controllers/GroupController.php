<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Event;

class GroupController extends Controller
{
    public function index(Group $group)
    {
        return view('groups/index')->with(['groups'=>$group->get()]);
    }
    
    public function show(Group $group)
    {
        return view('groups/show')->with(['group'=>$group]);
    }
    
    public function create()
    {
        return view('groups/create');
    }
    
    public function store(Group $group,Request $request)
    {
        $input=$request['group'];
        $group->fill($input)->save();
        return redirect('/groups/'.$group->id);
    }
    
    public function edit(Group $group)
    {
        return view('groups/edit')->with(['group'=>$group]);  
    }
    
    public function update(Request $request,Group $group)
    {
        $input=$request['group'];
        $group->fill($input)->save();
        return redirect('/groups/'.$group->id);
    }
    
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect('/groups');
    }
    
    public function invite (Group $group , User $user)
    {
        return view('groups/invite',compact('user'))->with(['profile_groups'=>$group])->with(['group_users'=>$user]);
    }
    
    public function event (Group $group)
    {
       //dd($group->events);
        return view('groups/event',compact('group'))->with(['group_events'=>$group->events]);
    }
}