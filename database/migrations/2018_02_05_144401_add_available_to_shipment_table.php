<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailableToShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->integer('available')->unsigned();
        });
        Schema::table('stocks', function (Blueprint $table) {
            $table->integer('damaged')->unsigned();
            $table->dropColumn('batch');
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn('available');
        });
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn('damaged');
            $table->integer('batch')->unsigned();
            $table->enum('type',['restock','damaged']);
        });
    }
}
