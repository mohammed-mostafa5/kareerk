<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->unsignedTinyInteger('status')
                ->default(1)
                ->comment('0 => Inactive, 1 => Active');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('userable_id');
            $table->string('userable_type');
            $table->integer('transactions_count')->default(0);
            $table->integer('balance')->default(0);
            $table->integer('subscription')->default(0);
            $table->timestamp('approved_at')->nullable();

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('user_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('value');
            $table->tinyInteger('action');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_transactions');
        Schema::dropIfExists('users');
    }
}
