<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTudemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tudemes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->date('date');
            $table->text('description')->nullable();
            $table->longText('body')->nullable();

            $table->integer('prep_time');
            $table->integer('cook_time');
            $table->integer('yield');
            $table->integer('serves');

            $table->uuid('cover_image_id')->nullable();
            $table->uuid('spread_id')->nullable();
            $table->uuid('icon_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

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
        Schema::dropIfExists('tudemes');
    }
}
