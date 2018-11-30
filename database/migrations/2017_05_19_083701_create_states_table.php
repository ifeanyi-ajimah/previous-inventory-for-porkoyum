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
            $table->string('iso_code');
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });

        // Insert some stuff
        DB::table('states')->insert(
            array(
            
                'name' => 'lagos',
                'region_id' => '1',
                'iso_code' => 'LA',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );

        DB::table('states')->insert(
            array(
            
                'name' => 'Abia',
                'region_id' => '2',
                'iso_code' => 'AB',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'abuja',
                'region_id' => '2',
                'iso_code' => 'FC',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Anambra',
                'region_id' => '2',
                'iso_code' => 'AN',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Adamawa',
                'region_id' => '2',
                'iso_code' => 'AD',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Bauchi',
                'region_id' => '2',
                'iso_code' => 'BA',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Bayelsa',
                'region_id' => '2',
                'iso_code' => 'BA',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Benue',
                'region_id' => '2',
                'iso_code' => 'BE',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Borno',
                'region_id' => '2',
                'iso_code' => 'BO',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Cross River',
                'region_id' => '2',
                'iso_code' => 'CR',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Delta',
                'region_id' => '2',
                'iso_code' => 'DE',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Ebonyi',
                'region_id' => '2',
                'iso_code' => 'EB',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Edo',
                'region_id' => '2',
                'iso_code' => 'ED',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Ekiti',
                'region_id' => '2',
                'iso_code' => 'EK',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Enugu',
                'region_id' => '2',
                'iso_code' => 'EN',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Gombe',
                'region_id' => '2',
                'iso_code' => 'Go',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Imo',
                'region_id' => '2',
                'iso_code' => 'IM',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Jigawa',
                'region_id' => '2',
                'iso_code' => 'JI',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Kaduna',
                'region_id' => '2',
                'iso_code' => 'KD',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Kastina',
                'region_id' => '2',
                'iso_code' => 'KT',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Kebbi',
                'region_id' => '2',
                'iso_code' => 'KE',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Kogi',
                'region_id' => '2',
                'iso_code' => 'KO',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Kwara',
                'region_id' => '2',
                'iso_code' => 'KW',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );

        DB::table('states')->insert(
            array(
            
                'name' => 'Nasarawa',
                'region_id' => '2',
                'iso_code' => 'NA',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Niger',
                'region_id' => '2',
                'iso_code' => 'NI',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Ogun',
                'region_id' => '2',
                'iso_code' => 'OG',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Ondo',
                'region_id' => '2',
                'iso_code' => 'ON',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Osun',
                'region_id' => '2',
                'iso_code' => 'OS',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Oyo',
                'region_id' => '2',
                'iso_code' => 'OY',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Plateau',
                'region_id' => '2',
                'iso_code' => 'PL',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'River',
                'region_id' => '2',
                'iso_code' => 'RI',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Sokoto',
                'region_id' => '2',
                'iso_code' => 'SO',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Taraba',
                'region_id' => '2',
                'iso_code' => 'TA',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Yobe',
                'region_id' => '2',
                'iso_code' => 'YO',
                'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
            )
        );
        DB::table('states')->insert(
            array(
            
                'name' => 'Zamfara',
                'region_id' => '2',
                'iso_code' => 'ZA',
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

