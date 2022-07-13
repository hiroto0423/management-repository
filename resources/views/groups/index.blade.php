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
        <a href='/top/{{\Auth::user()->id}}/groups'>所属しているグループ一覧</a>
        <h1>グループ一覧</h1>
        <p class="create">[<a href='/groups/create'>作成</a>]</p>
        <div class='groups'>
            @foreach ($groups as $group)
                <div class='group'>
                    <a href="/groups/{{$group->id}}">{{ $group->name }}</a>
                    <p class='goal'>{{ $group->goal }}</p>
                    <a href="/groups/{{$group->id}}/event">イベント一覧</a>
                </div>
            @endforeach
        </div>
    </body>
</html>
@endsection