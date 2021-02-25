<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerRequestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('career_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('cover_letter');
            $table->string('cv');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('career_id')
                ->references('id')
                ->on('careers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('career_requests');
    }
}
