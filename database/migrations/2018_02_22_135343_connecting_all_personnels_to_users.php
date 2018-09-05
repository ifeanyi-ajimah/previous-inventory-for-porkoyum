<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectingAllPersonnelsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comms_execs', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('fullname')->nullable()->change();
            $table->string('display_name')->nullable()->change();
        });

        Schema::table('delivery_people', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('fullname')->nullable()->change();
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
            $table->string('fullname')->change();
            $table->string('display_name')->change();
            $table->dropColumn('user_id');
        });

        Schema::table('delivery_people', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->string('fullname')->change();
        });
    }
}
