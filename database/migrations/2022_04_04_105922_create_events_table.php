<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title',50);
            $table->string('body',200);
            $table->string('start_time',50);
            $table->string('end_time',50);
            $table->string('where',50);
            $table->integer('group_id')->unsigned();
            $table->string('google_calendar_id')->nullable();
            $table->string('others',200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
