<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'id'=>1,          
           'name'=>'鷹野大斗',
           'body'=>'こんにちは',
           'email'=>'hiroto@hiroto.jp',
           'password'=>'Hiroto0801'
         ]);
         
        DB::table('users')->insert([
           'id'=>2,          
           'name'=>'あつや',
           'body'=>'こんにちは',
           'email'=>'atuya@atuya.jp',
           'password'=>'atuyaatuya'
         ]);
    }
}
