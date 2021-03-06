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
        @foreach ($group_events as $group_event)
            <div class='group_event'>
                <h2 class='title'>{{ $group_event->title }}</h2>
                <p class='body'>{{ $group_event->body }}</p>
                <p class='start_time'>開始時間:{{ $group_event->start_time }}</p>
                <p class='end_time'>終了時間：{{$group_event->end_time}}</p>
                <p class='where'>場所：{{ $group_event->where }}</p>
                <p class='others'>その他:{{ $group_event->others }}</p>
            </div>
        @endforeach
    </body>
</html>
@endsection