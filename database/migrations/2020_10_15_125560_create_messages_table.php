<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('message_content', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('subject')->nullable();
            $table->longText('body')->nullable();
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });


        Schema::create('messages', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('recipient_id');
            $table->unsignedBigInteger('content_id');

            $table->string('place_holder')
                ->default('InBox')
                ->comment('InBox, SentItems, Draft, Trash, Spam');

            $table->tinyInteger('is_read')
                ->default(0)
                ->comment('0=>New, 1=>Read');

            $table->tinyInteger('is_starred')
                ->default(0)
                ->comment('0=>Normal, 1=>Important');

            $table->timestamps();

            $table->foreign('recipient_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('content_id')
                ->references('id')
                ->on('message_content')
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
        Schema::dropIfExists('messages');
        Schema::dropIfExists('message_content');
    }
}
