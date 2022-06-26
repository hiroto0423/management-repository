<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Group;
use DB;
use Illuminate\Support\Arr;

class UserController extends Controller
{
   
    public function index(User $user,Request $request)
    {
         
         
        $keyword = $request->input('keyword');
     
    
        $query = User::query();
    
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
    
        $users = $query->paginate(10);
    
        return view('users/index')->with(['users' => $users,'keyword' => $keyword]);
    }
    
    public function follow_index(User $user)
    {
        return view('users/follow_index')->with(['follow_users'=>$user->follows]);
    }
    
    public function followed_index(User $user)
    {
       
        return view('users/followed_index')->with(['followed_users'=>$user->followUsers],);
    }
    
    public function show(User $user)
    {   
        $followCount = count(Follow::where('followed_user_id', $user->id)->get());
        return view('users/show',compact('user','followCount'));
    }
    
        public function profile_show(User $user)
    {   
        $followCount = count(Follow::where('followed_user_id', $user->id)->get());
        return view('profile/show',compact('user','followCount'));
    }
    
    
     public function follow(User $user) 
     {
         $user->followUsers()->attach(\Auth::id());
       // $follow = Follow::create([
           // 'following_user_id' => \Auth::user()->id,
        //    'followed_user_id' => $user->id,
        // ]);
        
        
        $followCount = count(Follow::where('followed_user_id', $user->id)->get());
        //dd($user->is_liked_by_auth_user());
        return view('/users/show',compact('followCount','user'));
        
    }

    public function unfollow(User $user) 
    {
        $follow = Follow::where('following_user_id', \Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('followed_user_id', $user->id)->get());
        //dd($user->is_liked_by_auth_user());
        return view('/users/show',compact('follow','followCount','user'));
    }
    
    public function invited(User $user)
    {
        //dd($user);
        return view('users/invited',compact('user'));
        
    }
    
    public function profile_create()
    {
        return view('profile/create');
    }
    
    public function profile_store(User $user,Request $request)
    {
        $input=$request['user'];
        $user->fill($input)->save();
        return redirect('/top/'.$user->id);
    }
    
    public function profile_edit(User $user)
    {
        return view('profile/edit',compact('user'));
    }
    
    public function profile_update(Request $request,User $user)
    {
        $input=$request['user'];
        $user->fill($input)->save();
        return redirect('top/'.$user->id);
    }
    
    public function profile_destroy(User $user)
    {
        $user->delete();
        return redirect('/top');
    }

   public function profile_groups(User $user, Group $group)
   {
        //dd($user->id);
      
       return view('profile/groups',compact('user'))->with(['profile_groups'=>$user->groups])->with(['group_users'=>$user]);
       
   }
   

   
   public function invite (User $user,Group $group)
   {
       return view('users/invite',compact('user'))->with(['groups'=>\Auth::user()->groups]);
   }
    
    public function invited_post(User $user,Request $request)
   {
       $input_groups=$request->groups_array;
       $input_users=$request['user'];
       
      
       $user->fill($input_users)->save();
       $user->groups()->attach($input_groups);
       //中間テーブルへの保存はattachメゾットを使用  
    return redirect('/users/'.$user->id);
       
   }
   
   public function invited_delete(User $user,Request $request)
    {
        
        $input_group=$request['delete_group'];
        DB::table('group_user')
                ->where('user_id',$user->id)
                ->where('group_id', $input_group)
                ->delete();
        return redirect('/users/'.$user->id.'/invited');
    }
    
    public function invited_comfirmed(User $user,Request $request)
    {
      $input_group=$request['group'];
            DB::table('group_user')
                ->where('user_id',$user->id)
                ->where('group_id',$input_group)
                ->update(['confirmed' => 1]);
         return redirect('/users/'.$user->id);       
    }
}
