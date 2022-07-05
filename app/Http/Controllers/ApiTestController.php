<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
   
class ApiTestController extends Controller
{


    public function google_calendar() {

        $events = Event::get(); // 未来の全イベントを取得する

        foreach ($events as $event) {

        $dt = new Carbon('2022-08-01');
        
        $event = new Event;
        $event->name = '新しいイベント名';
        $event->startDateTime = $dt;
        $event->endDateTime = $dt->addHour();   // 1時間後
        $event->description = "テスト説明文\nテスト説明文\nテスト説明文";
        $new_event = $event->save();

        }

    }
}
