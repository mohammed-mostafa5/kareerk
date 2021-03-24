<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('main_service_id')->nullable();
            $table->unsignedTinyInteger('expertise_level')->nullable();
            $table->integer('hourly_rate')->nullable();
            $table->string('title')->nullable();
            $table->text('overview')->nullable();
            $table->string('photo')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->unsignedTinyInteger('step')->default(1);
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('main_service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::create('freelancer_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('freelancer_id');
            $table->unsignedInteger('service_id');

            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });

        Schema::create('freelancer_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('freelancer_id');
            $table->unsignedInteger('skill_id');

            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });

        Schema::create('freelancer_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('freelancer_id');
            $table->unsignedInteger('language_id');
            $table->string('level');

            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });

        Schema::create('freelancer_education', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('freelancer_id');
            $table->string('school');
            $table->string('study')->nullable();
            $table->string('degree')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('file')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();

            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
        });

        Schema::create('freelancer_employment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('freelancer_id');
            $table->unsignedInteger('country_id');
            $table->string('city');
            $table->string('company');
            $table->string('title')->nullable();
            $table->string('from_date');
            $table->string('to_date')->nullable();
            $table->string('file')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('still_working')->comment('0 => No, 1 => Yes');

            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('freelancer_services');
        Schema::drop('freelancer_skills');
        Schema::drop('freelancer_languages');
        Schema::drop('freelancer_education');
        Schema::drop('freelancer_employment');
        Schema::drop('freelancers');
    }
}
