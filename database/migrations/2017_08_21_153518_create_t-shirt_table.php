<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTShirtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('sizes', function (Blueprint $table) {
            $table->increments('size_id');
            $table->text('name');
//            $table->integer('tshirt_id')->unsigned();
//            $table->text('deck');
//            $table->boolean('s');
//            $table->boolean('m');
//            $table->boolean('l');
//            $table->boolean('xl');
//            $table->boolean('xxl');
            $table->engine = 'InnoDB';
        });


        
        Schema::create('tshirts', function (Blueprint $table) {
            $table->increments('tshirt_id');
            $table->text('name');
            $table->text('description');
            $table->integer('price');
            $table->text('image');
//            $table->text('gender');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('size_tshirt', function ($table) {
            $table->integer('tshirt_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['tshirt_id', 'size_id']);
            $table->engine = 'InnoDB';
        });

        Schema::table('size_tshirt', function ($table) {
            $table->foreign('tshirt_id')->references('tshirt_id')->on('tshirts');
            $table->foreign('size_id')->references('size_id')->on('sizes');
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
        Schema::dropIfExists('sizes');
        Schema::dropIfExists('tshirts');
        Schema::dropIfExists('size_tshirt');
    }
}
