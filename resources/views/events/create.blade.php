
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
        <body>
        <form action="/top" method="POST">
            @csrf
            <div class="title">
                <h2>イベントタイトル</h2>
                <input type="text"name="event[title]"placeholder="夜ご飯いこ"/>
            </div>
            <div class="body">
                <h2>イベント内容</h2>
                <input type="text"name="event[body]"placeholder="みんなで楽しくご飯を食べましょう"/>
            </div>
            <div class="name">
                <h2>作成者</h2>
                <p>{{\Auth::user()->name}}</p>
                <input name="event[user_id]" type="hidden" value='{{\Auth::user()->id}}' >
                //作成者は元々ログインユーザーと決まっているため、typeはhiddenとする
                
            </div>
            <div class="start_time">
                <h2>開始時間</h2>
                <input type="datetime-local"name="event[start_time]"/>
            </div>
            <div class="end_time">
                <h2>終了時間</h2>
                <input type="datetime-local"name="event[end_time]"/>
            </div>
            <div class="where">
                <h2>開催場所</h2>
                <input type="text"name="event[where]"placeholder="牛角〇〇店"/>
            </div>
            <div class="others">
                <h2>その他</h2>
                <input type="text"name="event[others]"placeholder="一人2000円必要です"/>
            </div>
            <h2>グループ名</h2>
            <select name="event[group_id]">
                <option value="">選択してください</option>
                 @foreach($groups as $group)
                  <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            <div class"google_calendar_id">
                <input type="hidden"name="event[google_calendar_id]"value={{$event->google_calendar_id}}>
            </div>
            <input type="submit"value="store"/>
        </form>
        <div class="back">[<a href="/top">戻る</a>]</div>
    </body>
</html>