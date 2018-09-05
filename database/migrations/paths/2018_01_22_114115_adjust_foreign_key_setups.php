<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdjustForeignKeySetups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comms_execs', function (Blueprint $table) {
            $table->dropForeign('comms_execs_productcategories_id_foreign');
            $table->integer('productcategories_id')->unsigned()->nullable()->change();
            $table->foreign('productcategories_id')->references('id')->on('product_categories')->onDelete('set null');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropForeign('orders_product_cat_id_foreign');
            $table->dropForeign('orders_product_id_foreign');
            $table->dropForeign('orders_state_id_foreign');
            $table->dropForeign('orders_comms_rep_id_foreign');
            $table->dropForeign('orders_delivery_person_id_foreign');

            $table->integer('customer_id')->unsigned()->nullable()->change();
            $table->integer('product_cat_id')->unsigned()->nullable()->change();
            $table->integer('product_id')->unsigned()->nullable()->change();
            $table->integer('state_id')->unsigned()->nullable()->change();
            $table->integer('comms_rep_id')->unsigned()->nullable()->change();
            $table->integer('delivery_person_id')->unsigned()->nullable()->change();

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
        Schema::table('comms_execs', function (Blueprint $table) {
            $table->dropForeign('comms_execs_productcategories_id_foreign');
            $table->integer('productcategories_id')->unsigned()->change();
            $table->foreign('productcategories_id')->references('id')->on('product_categories');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropForeign('orders_product_cat_id_foreign');
            $table->dropForeign('orders_product_id_foreign');
            $table->dropForeign('orders_state_id_foreign');
            $table->dropForeign('orders_comms_rep_id_foreign');
            $table->dropForeign('orders_delivery_person_id_foreign');

            $table->integer('customer_id')->unsigned()->change();
            $table->integer('product_cat_id')->unsigned()->change();
            $table->integer('product_id')->unsigned()->change();
            $table->integer('state_id')->unsigned()->change();
            $table->integer('comms_rep_id')->unsigned()->change();
            $table->integer('delivery_person_id')->unsigned()->default(null)->change();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_cat_id')->references('id')->on('product_categories');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('comms_rep_id')->references('id')->on('comms_execs');
            $table->foreign('delivery_person_id')->references('id')->on('delivery_people');
        });
    }
}
