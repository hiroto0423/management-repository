@extends('layouts.app')　
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
           <h1>フォロワー一覧</h1>
            @foreach ($followed_users as $followed_user)
                <div class='follow'>
                    <a href="/users/{{$followed_user->id}}">{{ $followed_user->name }}</a>
                    <p class='body'>{{ $followed_user->body}}</p>
                </div>
            @endforeach
    </body>
</html>
@endsection