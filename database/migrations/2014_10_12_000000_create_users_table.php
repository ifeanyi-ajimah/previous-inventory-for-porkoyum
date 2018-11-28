<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
            DB::table('users')->insert(
                array(
                    'id' => 1,
                    'name' => 'admin',
                    'email' => 'info@porkoyum.com',
                    'password' => '$2y$10$4ht5c.U1sXYmoU1BfDWcoOkEBwn1lRY8dylcP7nRc1c67ZiHrobgq',
                    'remember_token' => str_random(10),
                    
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
        Schema::dropIfExists('users');
    }
}
