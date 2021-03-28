<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('cover')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedTinyInteger('status')->comment('0 => Inactive, 1 => Active');
            $table->unsignedTinyInteger('in_home')->comment('0 => No, 1 => Yes');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('service_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->string('locale', 2)->index();
            $table->string('name');
            $table->text('description');

            $table->unique(['service_id', 'locale']);

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
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
        Schema::drop('service_translations');
        Schema::drop('services');
    }
}
