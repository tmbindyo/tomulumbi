<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_images', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->boolean('is_print');
            $table->boolean('is_text');
            $table->integer('limit');

            $table->uuid('upload_id');
            $table->uuid('album_set_id');
            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

            $table->string('date_time')->nullable();

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
        Schema::dropIfExists('album_images');
    }
}
