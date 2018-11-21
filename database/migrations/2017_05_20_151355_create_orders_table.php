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
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('product_cat_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('quantity')->unsigned();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('value')->unsigned();
            $table->boolean('confirmed')->default(false);
            $table->boolean('urgent')->default(false);
            $table->boolean('delivered')->default(false);
            $table->boolean('cancelled')->default(false);
            $table->boolean('verified')->default(false);
            $table->integer('comms_rep_id')->unsigned()->nullable();
            $table->string('delivery_address')->nullable();
            $table->integer('delivery_person_id')->nullable()->unsigned();
            $table->integer('amount_paid')->default('0');
            $table->dateTime('date_paid')->nullable();
            $table->text('comment')->nullable();
            $table->datetime('expected_delivery_date')->nullable();
            $table->boolean('is_mobile_money')->default(false);

            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('product_cat_id')->references('id')->on('product_categories')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('comms_rep_id')->references('id')->on('comms_execs')->onDelete('set null');
            $table->foreign('delivery_person_id')->references('id')->on('delivery_people')->onDelete('set null');
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
