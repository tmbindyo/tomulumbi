<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumImageStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_image_stocks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('album_image_id');
            $table->uuid('dimension_id');
            $table->uuid('print_type_id');
            $table->double('quantity', 15, 2);
            $table->double('price', 15, 2);
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
        Schema::dropIfExists('album_image_stocks');
    }
}