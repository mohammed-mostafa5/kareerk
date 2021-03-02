<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedFreelancersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_freelancers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('freelancer_id');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->integer('value');

            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('featured_freelancers');
    }
}
