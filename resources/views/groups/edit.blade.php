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
        <form action="/groups/{{$group->id}}"method="POST">
            @csrf
            @method('PUT')
            <div class="name">
                <h2>Group Name</h2>
                <input type="text"name="group[name]"placeholder="leveteach"value="{{$group->name}}"/>
            </div>
            <div class="goal">
                <h2>Goal</h2>
                <input type="text"name="group[goal]"placeholder="プログラミングを学びましょう"value="{{$group->goal}}"/>
            </div>
            <input type="submit"value="update"/>
        </form>
        <div class="back">[<a href="/groups/{{$group->id}}">back</a>]</div>
    </body>
</html>
@endsection