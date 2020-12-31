<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->integer('parent_id')->nullable();
            $table->unsignedTinyInteger('status')->comment('0 => Inactive, 1 => Active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });


        Schema::create('skill_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('skill_id');
            $table->string('locale', 2)->index();
            $table->string('name');

            $table->unique(['skill_id', 'locale']);

            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skills');
    }
}
