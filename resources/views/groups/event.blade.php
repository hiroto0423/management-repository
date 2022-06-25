<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='event'>
            <a href='/top/event/{{$events->id}}/edit'>編集</a>
            <h2 class='title'>{{ $events->title }}</h2>
            <p class='body'>{{ $events->body }}</p>
            <p class='when'>日程:{{ $events->when }}</p>
            <p class='where'>場所：{{ $events->where }}</p>
            <p class='others'>その他:{{ $events->others }}</p>
            <p class='group'>グループ名：{{$group->name}}</p>
        </div>
    </body>
</html>