<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>イベント</h1>
        <form action="/top/event/{{$event->id}}"method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>イベントタイトル</h2>
                <input type="text"name="event[title]"placeholder="夜ご飯いこ"value='{{$event->title}}'/>
            </div>
            <div class="body">
                <h2>イベント内容</h2>
                <input type="text"name="event[body]"placeholder="みんなで楽しくご飯を食べましょう"value='{{$event->body}}'/>
            </div>

            <div class="when">
                <h2>日程</h2>
                <input type="text"name="event[when]"placeholder="明日"value='{{$event->when}}'/>
            </div>
            <div class="where">
                <h2>開催場所</h2>
                <input type="text"name="event[where]"placeholder="牛角〇〇店"value='{{$event->where}}'/>
            </div>
            <div class="others">
                <h2>その他</h2>
                <input type="text"name="event[others]"placeholder="一人2000円必要です"value='{{$event->others}}'/>
            </div>
            <h2>グループ名</h2>
            <select name="event[group_id]">
                <option value="">選択してください</option>
                 @foreach($groups as $group)
                  <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            <input type="submit"value="store"/>
        </form>
        </form>
        <div class="back">[<a href="/groups/{{$group->id}}">back</a>]</div>
    </body>
</html>