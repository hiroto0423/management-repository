<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;//既存のUser.phpに付け加えた
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use SoftDeletes;
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'body','email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_user_id', 'following_user_id');
    }
    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_user_id', 'followed_user_id');
    }
    
   public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
        
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
    
        $following_users = array();
        foreach($this->followUsers as $user) {
          array_push($following_users, $user->id);
        }
        
        if (in_array($id, $following_users)) {
          return true;
        } else {
          return false;
        }
    }
    
    public function groups()
    {
        return $this->belongsToMany('App\Group');
        
     
    }

 

}
