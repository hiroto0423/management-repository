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
            <a href='/top/event/{{$event->id}}/edit'>編集</a>
            
            <h2 class='title'>{{ $event->title }}</h2>
            <p class='body'>{{ $event->body }}</p>
            <p class='start_time'>開始時間:{{ $event->start_time }}</p>
            <p class='end_time'>終了時間：{{$event->end_time}}</p>
            <p class='where'>場所：{{ $event->where }}</p>
            <p class='others'>その他:{{ $event->others }}</p>
            <p class='group'>グループ名：{{$event->group->name}}</p>
        </div>
        
        <a href='/top/'>戻る</a>
    </body>
</html>


            