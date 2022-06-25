<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
           'id'=>1,          
           'name'=>'levertech',
           'goal'=>'プログラミングを学びましょう。',
        ]);
        
        DB::table('groups')->insert([
           'id'=>2,          
           'name'=>'同窓会',
           'goal'=>'集まりましょう',
        ]);
    }
}
