<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColumnsToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('urgency_status')->after('order_status');
            $table->integer('delivery_status')->after('urgency_status');
            $table->string('delivery_address')->after('comms_rep_id');
            $table->renameColumn('order_status', 'confirmed_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
//            $table->dropColumn('urgency_status');
//            $table->dropColumn('delivery_status');
//            $table->dropColumn('delivery_address');
        });
    }
}
