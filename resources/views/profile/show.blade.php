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
        <h1>プロフィール</h1>
        <a href="/top/{{Auth::user()->id}}/create">作成</a>
        <a href="/top/{{Auth::user()->id}}/edit">編集</a>
        <form action="/top/{{Auth::user()->id}}"id="form_delete" method="post">
            @csrf
            {{method_field('delete')}}
            <input type="submit"style="display:none">
            <p class='delete'>[<span onclick="return deleteUsers(this);">delete</span>]</p>
        </form>
        <h2>名前：{{$user->name}}</h2>
        <P>{{$user->body}}</p>
        <p>[<a href='/users/{{$user->id}}/invited'>招待リクエスト一覧</a>]</p>
        <a href='/users/{{$user->id}}/followedusers'>フォロワ―</a>
        <a href='/users/{{$user->id}}/followingusers'>フォロー中</a>
        <a href='/top/{{$user->id}}/groups'>所属しているグループ</a>
        <script>
            function deleteUsers(e){
                'use script';
                if(confirm('消去すると復元できません。\n本当に消去しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
@endsection