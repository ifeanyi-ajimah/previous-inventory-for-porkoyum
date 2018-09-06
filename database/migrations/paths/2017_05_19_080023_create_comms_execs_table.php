<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommsExecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comms_execs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('display_name');
            $table->integer('productcategories_id')->unsigned();
            $table->timestamps();

            $table->foreign('productcategories_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comms_execs');
    }
}
