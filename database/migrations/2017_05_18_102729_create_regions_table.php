<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Insert some stuff
            DB::table('regions')->insert(
                array(
                    'id' => '1',
                    'name' => 'lagos',
                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );

            DB::table('regions')->insert(
                array(
                    'id' => '2',
                    'name' => 'others',
                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
