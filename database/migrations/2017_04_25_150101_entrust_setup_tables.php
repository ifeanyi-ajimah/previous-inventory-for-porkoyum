<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
            // Insert some stuff
            DB::table('roles')->insert(
                array(
                    'name' => 'admin',
                    'display_name' => 'Administrator',
                    'description' => 'Should perform all tasks on the platform',

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );

            DB::table('roles')->insert(
                array(
                    'name' => 'comms',
                    'display_name' => 'Data Comms',
                    'description' => 'Should take orders',

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );

             DB::table('roles')->insert(
                array(
                    'name' => 'logistics',
                    'display_name' => 'Delivery Person',
                    'description' => 'People that handle product delivery',

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );

              DB::table('roles')->insert(
                array(
                    'name' => 'confirmers',
                    'display_name' => 'Order Confirmation',
                    'description' => 'Edit/Confirms Orders',

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );

               DB::table('roles')->insert(
                array(
                    'name' => 'inventory',
                    'display_name' => 'Inventory',
                    'description' => 'Responsible for managing state inventory',

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );


        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });
            // Insert some stuff
            DB::table('role_user')->insert(
                array(
                    'user_id' => 1,
                    'role_id' => 1,

                )
            );

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

            // Insert some stuff
            DB::table('permissions')->insert(
                array(
                    'id' => 1,
                    'name' => "create-order",
                    'display_name' => "Create Order",
                    'description' => "Creates orders for new and existing customers",

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                    
                )
            );

             DB::table('permissions')->insert(
                array(
                    'id' => 2,
                    'name' => "edit-order",
                    'display_name' => "Edit Order",
                    'description' => "Edit Orders",

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                    
                )
            );

              DB::table('permissions')->insert(
                array(
                    'id' => 3,
                    'name' => "create-user",
                    'display_name' => "Create User",
                    'description' => "Create New User",

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                    
                )
            );

               DB::table('permissions')->insert(
                array(
                    'id' => 4,
                    'name' => "delete-user",
                    'display_name' => "Delete User",
                    'description' => "Deletes Users",

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                    
                )
            );


               DB::table('permissions')->insert(
                array(
                    'id' => 5,
                    'name' => "confirm-order",
                    'display_name' => "Confirms Order",
                    'description' => "Ability to confirm orders",

                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                    
                )
            );

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });


            // Insert some stuff
            DB::table('permission_role')->insert(
                array(
                    'permission_id' => 1,
                    'role_id' => 1,

                )
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
