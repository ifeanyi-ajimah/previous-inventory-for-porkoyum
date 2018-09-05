<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmColumnToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('confirmed_status','confirmed');
            $table->renameColumn('delivery_status','delivered');
            $table->renameColumn('urgency_status','urgent');
            $table->renameColumn('product_quantity','quantity');
            $table->renameColumn('product_value','value');
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
            $table->renameColumn('confirmed','confirmed_status');
            $table->renameColumn('delivered','delivery_status');
            $table->renameColumn('urgent','urgency_status');
            $table->renameColumn('quantity','product_quantity');
            $table->renameColumn('value','product_value');
        });
    }
}
