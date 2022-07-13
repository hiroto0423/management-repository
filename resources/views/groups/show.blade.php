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
        <h1>Group Name</h1>
        <p class="edit">[<a href="/groups/{{$group->id}}/edit">編集</a>]</p>
        <form action="/groups/{{$group->id}}"id="form_delete" method="post">
            @csrf
            {{method_field('delete')}}
            <input type="submit"style="display:none">
            <p class='delete'>[<span onclick="return deleteGroups(this);">delete</span>]</p>
        </form>
        <div class="name">
            <P>{{ $group->name }}</p>
        </div>
        <div class="content">
            <h3>目的</h3>
            <p>{{ $group->goal }}</p>    
        </div>
        <div class="footer">
            <a href="/groups">戻る</a>
        </div>
        <script>
            function deleteGroups(e){
                'use script';
                if(confirm('消去すると復元できません。\n本当に消去しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
@endsection