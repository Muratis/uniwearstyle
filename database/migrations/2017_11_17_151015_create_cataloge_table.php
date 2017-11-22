<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('tshirts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('university');
            $table->text('description');
            $table->integer('price')->index();
            $table->text('image');
            $table->boolean('stock')->default(1);

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('poloes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('university');
            $table->text('description');
            $table->integer('price')->index();
            $table->text('image');
            $table->boolean('stock')->default(1);

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('bombers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('university');
            $table->text('description');
            $table->integer('price')->index();
            $table->text('image');
            $table->boolean('stock')->default(1);

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('hoodies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('university');
            $table->text('description');
            $table->integer('price')->index();
            $table->text('image');
            $table->boolean('stock')->default(1);

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('sweatshirts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('university');
            $table->text('description');
            $table->integer('price')->index();
            $table->text('image');
            $table->boolean('stock')->default(1);

            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('sizes_tshirt', function ($table) {
            $table->integer('id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['id', 'size_id']);
            $table->engine = 'InnoDB';
        });

        Schema::create('sizes_polo', function ($table) {
            $table->integer('id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['id', 'size_id']);
            $table->engine = 'InnoDB';
        });

        Schema::create('sizes_bomber', function ($table) {
            $table->integer('id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['id', 'size_id']);
            $table->engine = 'InnoDB';
        });

        Schema::create('sizes_hoodie', function ($table) {
            $table->integer('id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['id', 'size_id']);
            $table->engine = 'InnoDB';
        });

        Schema::create('sizes_sweatshirt', function ($table) {
            $table->integer('id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['id', 'size_id']);
            $table->engine = 'InnoDB';
        });



        Schema::table('sizes_tshirt', function ($table) {
            $table->foreign('id')->references('id')->on('tshirts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('sizes_polo', function ($table) {
            $table->foreign('id')->references('id')->on('poloes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('sizes_hoodie', function ($table) {
            $table->foreign('id')->references('id')->on('hoodies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('sizes_sweatshirt', function ($table) {
            $table->foreign('id')->references('id')->on('sweatshirts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

        Schema::table('sizes_bomber', function ($table) {
            $table->foreign('id')->references('id')->on('bombers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });

//        Schema::table('tshirts', function ($table) {
//            $table->index('price');
//            $table->index('name');
//        });
//
//        Schema::table('poloes', function ($table) {
//            $table->index('price');
//            $table->index('name');
//        });
//
//        Schema::table('hoodies', function ($table) {
//            $table->index('price');
//            $table->index('name');
//        });
//
//        Schema::table('bombers', function ($table) {
//            $table->index('price');
//            $table->index('name');
//        });
//
//        Schema::table('sweatshirts', function ($table) {
//            $table->index('price');
//            $table->index('name');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
