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
        <h1>プロフィール作成</h1>
        <form action="/top/{{Auth::user()->id}}"method="POST">
            @csrf
            <div class="name">
                <h2>あなたの名前</h2>
                <input type="text"name="user[name]"placeholder="山田太郎"/>
            </div>
            <div class="body">
                <h2>自己紹介</h2>
                <input type="text"name="user[body]"placeholder="こんにちは。20歳です。"/>
            </div>
            <input type="submit"value="store"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection