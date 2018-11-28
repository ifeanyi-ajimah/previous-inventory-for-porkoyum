<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('region_id')->unsigned();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });

        // Insert some stuff
        DB::table('states')->insert(
            array(
            
                'name' => 'lagos',
                'region_id' => '1',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );

        DB::table('states')->insert(
            array(
            
                'name' => 'abia',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'abuja',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Anambra',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Adamawa',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Bauchi',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Bayelsa',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Benue',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Borno',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Cross River',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Delta',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Ebonyi',
                'region_id' => '2',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Edo',
                'region_id' => '2',
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
        Schema::dropIfExists('states');
    }
}

