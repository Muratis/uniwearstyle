<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Schema::create('university', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('email_id');
//            $table->string('university')->index();
//            $table->timestamps();
//        });
//
//        Schema::table('university', function ($table) {
//            $table->foreign('id')->references('id')->on('cataloge')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('size_id')->references('size_id')->on('sizes');
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
