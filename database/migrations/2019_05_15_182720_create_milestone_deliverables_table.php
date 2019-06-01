<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestoneDeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestone_deliverables', function (Blueprint $table) {
            $table->primary('id');
            $table->uuid('id');

            $table->string('name');
            $table->longText('description');
            $table->integer('milestone_id')->unsigned();
            // $table->foreign('milestone_id')->references('id')->on('project_milestones');
            $table->integer('assignee_id')->unsigned();
            // $table->foreign('assignee_id')->references('id')->on('users');
            $table->integer('status_id')->unsigned();
            // $table->foreign('status_id')->references('id')->on('statuses');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('milestone_deliverables');
    }
}
