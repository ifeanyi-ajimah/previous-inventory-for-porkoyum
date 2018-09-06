<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('product_cat_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('product_quantity')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('product_value')->unsigned();
            $table->integer('order_status');
            $table->integer('comms_rep_id')->unsigned();
            $table->integer('delivery_person_id')->default(null)->unsigned();
            $table->integer('amount_paid')->default('0');
            $table->dateTime('date_paid')->default(null);
            $table->text('comment')->nullable();
            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_cat_id')->references('id')->on('product_categories');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('comms_rep_id')->references('id')->on('comms_execs');
            $table->foreign('delivery_person_id')->references('id')->on('delivery_people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
