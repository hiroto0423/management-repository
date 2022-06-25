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
            @foreach ($profile_groups as $profile_group)
                <?php if ($profile_group->confirmed == 1): ?> 
                    <div class='groups'>
                        //if文で　accsepted　がtureだったら表示するようう後ほど変更
                        <a href="/groups/{{$profile_group->id}}">{{ $profile_group->name }}</a>
                    </div>
                <?php endif; ?>
            @endforeach
    </body>
</html>