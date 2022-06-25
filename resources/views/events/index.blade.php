<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <a href="top/{{Auth::user()->id}}">[マイページ]</a>
    <a href="/groups">[グループ]</a>
    <a href="/users">[ユーザー検索]</a>
    <p class="create">[<a href="/top/event/create">イベント作成</a>]</p>
    <h1>投稿一覧</h1>
        <div class='events'>
            @foreach ($events as $event)
                <div class='event'>
                    <h2 class='title'>{{ $event->title }}</h2>
                    <a href="/top/event/{{$event->id}}">詳細</a>
                </div>
            @endforeach
        </div>
    </body>
</html>
