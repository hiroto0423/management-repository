<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>あなたの所属グループ</h1>
        <h2>{{$user->name}}</h2>
            <ul>
            @foreach($user->groups as $group)
                <?php if ($group->pivot->confirmed === 1):?> 
                    <p>{{$group->id}}</p>
                    <li>{{$group->name}}</li>
                <?php endif;?>
             @endforeach
            </ul>
    </body>
</html>