<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->primary('id');
            $table->uuid('id');

            $table->string('item_name');
            $table->longText('description');
            $table->longText('reason');
            $table->integer('number');
            $table->double('amount', 8, 2);
            $table->integer('project_milestones_id')->unsigned();
            // $table->foreign('project_milestones_id')->references('id')->on('project_milestones');
            $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->integer('status_id')->unsigned();
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
        Schema::dropIfExists('requisitions');
    }
}
