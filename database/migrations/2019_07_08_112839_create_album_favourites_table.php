<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_favourites', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->string('email');
            $table->text('note');
            
            $table->uuid('album_id');
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
        Schema::dropIfExists('album_favourites');
    }
}
