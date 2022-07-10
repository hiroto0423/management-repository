<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('events')->insert([
        'id' => 1,
        'title' => '命名の心得',
        'body' => '命名はデータを基準に考える',
        'start_time'=>'2022-07-08T15:20',
        'end_time'=>'2022-07-09T15:20',
        'where'=>'学校',
        'others'=>'aidfhaf',
        'group_id'=>1,
    ]);
    
         DB::table('events')->insert([
        'id' => 2,
        'title' => '同窓会開催',
        'body' => '同窓会の開催します',
        'start_time'=>'2022-07-10T15:20',
        'end_time'=>'2022-07-11T15:20',
        'where'=>'学校',
        'others'=>'特になし',
        'group_id'=>2,
    ]);
    }
}
