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
            $table->timestamps();

            
        });

        // Insert some product
            DB::table('products')->insert(
                array(
                    'product_name' => 'Porkoyum Sausage',
                    'price' => '1500',
                )
            );

            DB::table('products')->insert(
                array(
                    'product_name' => 'Porkoyum Bacon',
                    'price' => '1800',
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
