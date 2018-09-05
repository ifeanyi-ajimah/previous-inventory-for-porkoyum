<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->integer('batch')->unsigned()->default(0);
            $table->enum('type',['restock','damaged']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->dropColumn('quantity');
            $table->dropColumn('batch');
            $table->dropColumn('type');
        });
    }
}
