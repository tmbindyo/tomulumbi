<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThumbnailSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thumbnail_sizes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('reference');
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
        Schema::dropIfExists('thumbnail_sizes');
    }
}
