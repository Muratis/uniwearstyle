<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('carts', function (Blueprint $table) {

            $table->increments('cart_id');
//            $table->integer('cart_id')->unsigned();
            $table->text('name');
            $table->integer('price');
            $table->text('image');
            $table->timestamps();
            $table->engine = 'InnoDB';


        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('city');
            $table->text('address');
            $table->integer('phone');
            $table->integer('cart_id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';


        });





        Schema::table('users', function ($table) {
            $table->foreign('cart_id')->references('cart_id')->on('carts')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('carts');
        Schema::drop('users');
    }
}
