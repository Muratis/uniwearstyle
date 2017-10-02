<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKPIshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
                    //Футболки

        Schema::create('tshirts_KPI', function (Blueprint $table) {
            $table->increments('tshirt_id');
            $table->text('name');
            $table->text('description');
            $table->integer('price');
            $table->text('image');
//            $table->text('gender');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

                        //Поло

        Schema::create('polo_KPI', function (Blueprint $table) {
            $table->increments('polo_id');
            $table->text('name');
            $table->text('description');
            $table->integer('price');
            $table->text('image');
//            $table->text('gender');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

                        //Худи

        Schema::create('hoodies_KPI', function (Blueprint $table) {
            $table->increments('hoodie_id');
            $table->text('name');
            $table->text('description');
            $table->integer('price');
            $table->text('image');
//            $table->text('gender');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

                //Свитшоты

          Schema::create('sweatshirts_KPI', function (Blueprint $table) {
              $table->increments('sweatshirt_id');
              $table->text('name');
              $table->text('description');
              $table->integer('price');
              $table->text('image');
//            $table->text('gender');

              $table->timestamps();
              $table->engine = 'InnoDB';
          });


                        //Бомберы

          Schema::create('bombers_KPI', function (Blueprint $table) {
              $table->increments('bomber_id');
              $table->text('name');
              $table->text('description');
              $table->integer('price');
              $table->text('image');
//            $table->text('gender');

              $table->timestamps();
              $table->engine = 'InnoDB';
          });


                    //Бомберы

                     //Временные таблицы


        Schema::create('size_tshirt_KPI', function ($table) {
            $table->integer('tshirt_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['tshirt_id', 'size_id']);
            $table->engine = 'InnoDB';
        });


        Schema::create('size_polo_KPI', function ($table) {
            $table->integer('polo_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['polo_id', 'size_id']);
            $table->engine = 'InnoDB';
        });


        Schema::create('size_hoodies_KPI', function ($table) {
            $table->integer('hoodie_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['hoodie_id', 'size_id']);
            $table->engine = 'InnoDB';
        });


        Schema::create('size_sweatshirts_KPI', function ($table) {
            $table->integer('sweatshirt_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['sweatshirt_id', 'size_id']);
            $table->engine = 'InnoDB';
        });


        Schema::create('size_bombers_KPI', function ($table) {
            $table->integer('bomber_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['bomber_id', 'size_id']);
            $table->engine = 'InnoDB';
        });








        Schema::table('size_tshirt_KPI', function ($table) {
            $table->foreign('tshirt_id')->references('tshirt_id')->on('tshirts_KPI')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('size_polo_KPI', function ($table) {
            $table->foreign('polo_id')->references('polo_id')->on('polo_KPI')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('size_hoodies_KPI', function ($table) {
            $table->foreign('hoodie_id')->references('hoodie_id')->on('hoodies_KPI')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('size_sweatshirts_KPI', function ($table) {
            $table->foreign('sweatshirt_id')->references('sweatshirt_id')->on('sweatshirts_KPI')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('size_bombers_KPI', function ($table) {
            $table->foreign('bomber_id')->references('bomber_id')->on('bombers_KPI')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });







//        Schema::table('tshirts_KPI', function ($table) {
//            $table->onDelete('cascade');
//        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('tshirts_KPI');
        Schema::dropIfExists('size_tshirt_KPI');

        Schema::dropIfExists('polo_KPI');
        Schema::dropIfExists('size_polo_KPI');

        Schema::dropIfExists('hoodies_KPI');
        Schema::dropIfExists('size_hoodies_KPI');

        Schema::dropIfExists('sweatshirts_KPI');
        Schema::dropIfExists('size_sweatshirts_KPI');

        Schema::dropIfExists('bombers_KPI');
        Schema::dropIfExists('size_bombers_KPI');
    }
}
