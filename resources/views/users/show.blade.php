<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>{{ $user->name }}</h1>
        <P>{{ $user->body }}</p>
        <p>[<a href='/users/{{$user->id}}/invited'>招待リクエスト一覧</a>]</p>
        <a href='/users/{{$user->id}}/followedusers'>フォロワ―</a>
        <a href='/users/{{$user->id}}/followingusers'>フォロー中</a>

        <div>
        @if($user->is_liked_by_auth_user())
         <form action="{{ route('unfollow', ['user' => $user->id]) }}"method="POST">
             @csrf
            <button class="btn btn-secondary btn-sm">フォロー中<span class="badge">{{ $followCount}}</span></button>
        </form>
          @else
           <form action="{{ route('follow', ['user' => $user->id]) }}"method="POST">
               @csrf
            <button class="btn btn-secondary btn-sm">フォローする<span class="badge">{{ $followCount }}</span></button>
            </form>
          @endif
        </div>
        
        <a href='/top/{{$user->id}}/groups'>所属しているグループ</a>
        

    </body>
</html>