<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offering_types', function (Blueprint $table) {
            $table->primary('id');
            $table->uuid('id');

            $table->string('name');
            $table->longText('description');
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
        Schema::dropIfExists('offering_types');
    }
}
