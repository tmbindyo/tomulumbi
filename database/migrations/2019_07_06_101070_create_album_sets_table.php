<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_sets', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->boolean('is_client_exclusive_access');
            $table->boolean('is_email_download_restrict');

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
        Schema::dropIfExists('album_sets');
    }
}
