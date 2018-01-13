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
        Schema::create('cataloge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('university')->index();
            $table->string('clothes_type')->index();
            $table->text('description');
            $table->integer('price')->index();
            $table->string('gender')->index();
            $table->text('image');
            $table->boolean('stock')->default(1);

            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('sizes_cataloge', function ($table) {
            $table->integer('id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->primary(['id', 'size_id']);
            $table->engine = 'InnoDB';
        });


        Schema::table('sizes_cataloge', function ($table) {
            $table->foreign('id')->references('id')->on('cataloge')->onDelete('cascade')->onUpdate('cascade');
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
        //
    }
}
