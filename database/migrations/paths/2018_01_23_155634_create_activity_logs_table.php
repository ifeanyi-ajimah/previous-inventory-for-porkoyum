<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * Description of actions
     *
     * create   - creating orders, comms execs, etc
     * delete   - deleting orders, or anything else
     * login    - when a user logged in
     * assign   - when an order is assigned for delivery or assigned to a comms execs
     * add      - when inventory is added or anything that can be added
     * confirm  - when a delivery or order is confirmed, etc
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('summary');
            $table->enum('action',['create','update','delete','login','logout','assign','add','confirm'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}
