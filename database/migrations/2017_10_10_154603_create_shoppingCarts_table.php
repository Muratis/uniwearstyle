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


                Schema::create('shoppingcart', function (Blueprint $table) {
            $table->string('identifier');
            $table->string('instance');
            $table->longText('content');
            $table->nullableTimestamps();

            $table->primary(['identifier', 'instance']);
        });

        Schema::create('shoppingUsers', function (Blueprint $table) {
            $table->increments('user_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('methodPost');
            $table->text('city');
            $table->text('address');
            $table->integer('phone');
            $table->integer('cart_id')->unsigned();
            $table->boolean('is_active');
            $table->timestamps();
            $table->engine = 'InnoDB';


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
        Schema::drop('shoppingUsers');
    }
}
