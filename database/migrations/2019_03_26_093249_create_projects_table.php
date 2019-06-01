<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->primary('id');
            $table->uuid('id');

            $table->string('name');
            $table->longText('description');
            $table->longText('video');
            $table->integer('return_rate');
            $table->double('valuation', 20, 2)->nullable();
            $table->double('share_price', 20, 2)->nullable();
            $table->double('minimum_investment', 20, 2)->nullable();
            $table->double('total_budget', 20, 2)->nullable();
            $table->double('contributed_budget', 20, 2)->nullable();
            $table->double('used_budget', 20, 2)->nullable();
            $table->double('remaining_budget', 20, 2)->nullable();
            $table->integer('offering_type_id')->unsigned();
            $table->integer('project_type_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            // $table->foreign('project_type_id')->references('id')->on('project_types');
            $table->integer('status_id')->unsigned();
            // $table->foreign('status_id')->references('id')->on('statuses');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('projects');
    }
}
