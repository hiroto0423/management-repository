<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
  
        <h1>検索</h1>

        <form action="{{url('/users')}}" method="GET">
            <p><input type="text" name="keyword" value="{{$keyword}}"></p>
            <p><input type="submit" value="検索"></p>
        </form>

        @if($users->count())

        <table border="1">
            <tr>
                <th>名前</th>
                <th>自己紹介</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td><a href="/users/{{$user->id}}">{{ $user->name }}</a></td>
                <td>{{ $user->body }}</td>
                <td><a href="/users/{{$user->id}}/invite">グループに招待する</a></td>
            </tr>
            
            @endforeach
        </table>

        @else
        <p>見つかりませんでした。</p>
        @endif
        <div class='paginate'>
            {{ $users->links() }}
        </div>
    </body>
</html>