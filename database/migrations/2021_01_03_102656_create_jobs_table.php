<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('expertise_level')->nullable()->comment('1 => Entry Level, 2 => Intermediate, 3 => Expert');
            $table->unsignedTinyInteger('visibility')->nullable()->comment('1 => Any One, 2 => Invite Only');
            $table->integer('freelancers_count')->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('budget')->nullable();
            $table->unsignedTinyInteger('expected_time')->nullable();
            $table->unsignedTinyInteger('step')->default(1);
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('progress_status')->default(1);
            $table->dateTime('completed_at')->nullable();
            $table->unsignedTinyInteger('available')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });


        Schema::create('job_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_id');
            $table->string('file');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });

        Schema::create('job_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('skill_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });

        Schema::create('job_invitations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('freelancer_id');
            $table->unsignedTinyInteger('proposaled')->default(0);

            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
        });

        Schema::create('job_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('freelancer_id');
            $table->string('expected_time');
            $table->text('cover_letter');
            $table->unsignedTinyInteger('accepted')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
        });

        Schema::create('proposal_milestones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proposal_id');
            $table->string('title');
            $table->text('description');
            $table->integer('duration');
            $table->unsignedTinyInteger('duration_type')->comment('1 => Hour, 2 => Day, 3 => Month');
            $table->string('amount');
            $table->unsignedTinyInteger('status')->default(1)->comment('1 => New, 2 => Finished, 3 => Done, 4 => Refused/Problem');
            $table->unsignedTinyInteger('admin_status')->default(1)
                ->comment('1 => New, 2 => Under review, 3 => Solved, 4 =>  Not Solved, 5 => Payment Done, 6 => Client Refunded');
            $table->text('problem_description')->nullable();
            $table->dateTime('expected_start');
            $table->dateTime('payment_at')->nullable();
            $table->dateTime('finished_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proposal_id')->references('id')->on('job_proposals')->onDelete('cascade');
        });

        Schema::create('proposal_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proposal_id');
            $table->string('file');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proposal_id')->references('id')->on('job_proposals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proposal_files');
        Schema::drop('proposal_milestones');
        Schema::drop('job_proposals');
        Schema::drop('job_invitations');
        Schema::drop('job_skills');
        Schema::drop('job_files');
        Schema::drop('jobs');
    }
}
