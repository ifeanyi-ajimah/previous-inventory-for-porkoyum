<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('price');
            $table->string('dashboard_color')->nullable();
            $table->string('description')->nullable();
            $table->string('image');
            $table->timestamps();

            
        });

        // Insert some product
            DB::table('products')->insert(
                array(
                    'product_name' => 'Porkoyum Sausage',
                    'price' => '1500',
                    'dashboard_color' => 'warning',
                    'description' => 'This is an amazing sausage',
                    'image' => 'baconimg.png',
                    'created_at' => date_create('now')->format('Y-m-d H:i:s'),
                    'updated_at' => date_create('now')->format('Y-m-d H:i:s'),
                )
            );

            DB::table('products')->insert(
                array(
                    'product_name' => 'Porkoyum Bacon',
                    'price' => '1800',
                    'dashboard_color' => 'danger',
                    'description' => 'This is an amazing Bacon',
                    'image' => 'sausageimg.png',
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
        Schema::dropIfExists('products');
    }
}
