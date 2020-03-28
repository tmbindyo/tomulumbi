<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->integer('number');
            $table->string('name');
            $table->string('cook_time');
            $table->text('description')->nullable();
            $table->text('body')->nullable();

            $table->uuid('cuisine_id');
            $table->uuid('cooking_skill_id');
            $table->uuid('dish_type_id');
            $table->uuid('food_type_id');
            $table->uuid('meal_type_id');
            $table->uuid('tudeme_id');
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
        Schema::dropIfExists('meals');
    }
}
