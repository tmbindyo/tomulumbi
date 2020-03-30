<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_views', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('cookie')->nullable();
            $table->dateTime('expiry')->nullable();
            $table->string('email')->nullable();
            $table->longText('request')->nullable();
            $table->integer('number');

            $table->uuid('album_id')->nullable();

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
        Schema::dropIfExists('album_views');
    }
}
