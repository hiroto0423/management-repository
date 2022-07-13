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
        <h1>Group</h1>
        <form action="/top/{{Auth::user()->id}}"method="POST">
            @csrf
            @method('PUT')
            <div class="name">
                <h2>あなたの名前</h2>
                <input type="text"name="user[name]"placeholder="山田太郎"value="{{$user->name}}"/>
            </div>
            <div class="body">
                <h2>自己紹介</h2>
                <input type="text"name="user[body]"placeholder="こんにちは。20歳です。"value="{{$user->body}}"/>
            </div>
            <input type="submit"value="update"/>
        </form>
    </body>
</html>
@endsection