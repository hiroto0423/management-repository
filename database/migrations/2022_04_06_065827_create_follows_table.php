<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('following_user_id')->unsigned();
            $table->integer('followed_user_id')->unsigned();
            $table->unique(['following_user_id','followed_user_id']);
             $table->foreign('followed_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('following_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
}