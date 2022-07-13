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
        <form action="/users/{{$user->id}}"method="POST">
            @csrf
            @method('PUT')
          　<input name="user[id]" type="hidden" value="{{$user->id}}" >
            <input name="user[name]" type="hidden" value="{{$user->name}}" >
            <input name="user[body]" type="hidden" value="{{$user->body}}" >
            <input name="user[created_at]" type="hidden" value="{{$user->created_at}}" >
            <input name="user[updated_at]" type="hidden" value="{{$user->updated_at}}" >
            <input name="user[deleted_at]" type="hidden" value="{{$user->deleted_at}}" >
            <input name="user[email]" type="hidden" value="{{$user->email}}" >
            <input name="user[email_verified_at]" type="hidden" value="{{$user->email_verified_at}}" >
            <input name="user[password]" type="hidden" value="{{$user->password}}" >
            <input name="user[remember_token]" type="hidden" value="{{$user->remember_token}}" >
            <h2>グループに招待する</h2>
            <select name="groups_array[]"multiple>
                <option value="">選択してください。</option>
                @foreach($groups as $group)
                 <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            <input type="submit"value="招待する"/>
        </form>
    </body>
</html>
@endsection