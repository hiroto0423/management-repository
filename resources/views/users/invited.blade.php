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
        <h1>招待リクエスト一覧</h1>
        <h2>{{$user->name}}</h2>
            <ul>
            @foreach($user->groups as $group)
                <?php if ($group->pivot->confirmed === 0):?> 
                    <p>{{$group->id}}</p>
                    <li>{{$group->name}}</li>
                     <form action="/users/{{$user->id}}/invited"id="form_delete_{{$group->id}}" method="post">
                        @csrf
                        {{method_field('delete')}}
                        <input name="delete_group[id]" type="hidden" value="{{$group->id}}" >
                        <input type="submit"style="display:none">
                        <p class='delete'>[<span onclick="return deleteInvite(this, 'form_delete_{{$group->id}}');">拒否する</span>]</p>
                    </form>
                    <form action="/users/{{$user->id}}/invited"method="post">
                         @csrf
                        <input name="group"type="hidden"value="{{$group->id}}"/>
                        <input type="submit"value="承認する"/>
                    </form>
                <?php endif;?>
             @endforeach
            </ul>
        <script>
            function deleteInvite(e, id){
                'use script';
                if(confirm('拒否すると招待一覧ページから招待が削除されます\n本当に拒否しますか？')){
                    document.getElementById(id).submit();
                }
            }
        </script>
    </body>
</html>
@endsection
