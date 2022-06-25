<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Follow;
use app\user;

class FollowContoroller extends Controller
{
    public function follow(User $user) {
        $follow = Follow::create([
            'following_user_id' => \Auth::user()->id,
            'followed_user_id' => $user->id,
        ]);
        $followCount = count(Follow::where('followed_user_id', $user->id)->get());
        return view('/follows/show',compact('follow','followCount','user'));
        
    }

    public function unfollow(User $user) {
        $follow = Follow::where('following_user_id', \Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('followed_user_id', $user->id)->get());
        return view('/follows/show',compact('follow','followCount','user'));
    }
     
}
