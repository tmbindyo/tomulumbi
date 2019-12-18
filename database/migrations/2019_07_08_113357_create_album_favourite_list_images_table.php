<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumFavouriteListImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_favourite_list_images', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->text('notes');

            $table->uuid('album_favourite_list_id');
            $table->uuid('album_image_id');
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
        Schema::dropIfExists('album_favourite_list_images');
    }
}
