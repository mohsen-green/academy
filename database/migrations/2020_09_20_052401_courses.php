<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->timestamp('time')->nullable();
            $table->timestamp('end_coures')->nullable();
            $table->timestamp('start_coures')->nullable();
            $table->bigInteger('price')->nullable();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}
