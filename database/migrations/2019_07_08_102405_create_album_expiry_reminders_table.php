<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumExpiryRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_expiry_reminders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('days');

            $table->boolean('to_registered_clients');
            $table->boolean('to_downloaded_clients');
            $table->boolean('to_favourite_clients');
            $table->boolean('to_purchased_clients');
            $table->boolean('to_expiry_email_clients');

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
        Schema::dropIfExists('album_expiry_reminders');
    }
}
