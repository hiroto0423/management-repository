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
        
        @if(\Auth::user()->events()->where('event_id',$event->id)->exists())
         <form action="/event_unattend"method="POST">
             @csrf
             <input type='hidden' name='event_id'value='{{$event->id}}'/>
            <button>参加中</button>
        </form>
          @else
           <form action="/event_attend"method="POST">
               @csrf
            <input type='hidden' name='event_id'value='{{$event->id}}'/>
            <button>参加する</button>
            </form>
          @endif
        <form action='/top/event/{{$event->id}}'id='form_{{ $event->id }}' method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">消去</button> 
        </form>
        <a href='/top/'>戻る</a>
    </body>
</html>
@endsection

            