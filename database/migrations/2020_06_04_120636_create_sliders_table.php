<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo');
            $table->string('link');
            $table->string('in_order_to');
            $table->string('status')
                ->comment('Active, Inactive');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('slider_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('slider_id');
            $table->string('locale', 2)->index();
            $table->string('title');
            $table->string('subtitle');
            $table->string('button_text');
            $table->longText('content')->nullable();

            $table->unique(['slider_id', 'locale']);

            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slider_translations');
        Schema::drop('sliders');
    }
}
