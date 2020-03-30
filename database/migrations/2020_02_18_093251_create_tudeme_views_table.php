<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTudemeViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tudeme_views', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->longText('request')->nullable();
            $table->integer('number');
            $table->string('cookie')->nullable();

            $table->boolean('is_tudeme')->nullable();
            $table->uuid('tudeme_id')->nullable();

            $table->boolean('is_tudeme_gallery')->nullable();
            $table->uuid('tudeme_gallery_id')->nullable();

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
        Schema::dropIfExists('tudeme_views');
    }
}
