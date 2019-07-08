<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // General
            $table->string('name');
            $table->string('url');
            $table->date('date');
            $table->boolean('is_auto_expiry');
            $table->date('expiry_date');
            $table->uuid('album_type_id');
            $table->uuid('cover_image_id');
            $table->longText('description');

            // Design
            $table->uuid('typography_id');
            $table->uuid('grid_style_id');
            $table->uuid('color_id');
            $table->uuid('thumbnail_size_id');
            $table->uuid('grid_spacing_id');
            $table->uuid('cover_design_id');

            // Privacy
            $table->string('password');
            $table->boolean('is_homepage_visible');
            $table->boolean('is_client_exclusive_access');
            $table->string('client_access_password');
            $table->boolean('is_client_make_private');

            // Download
            $table->boolean('is_download');
            $table->boolean('is_download_pin');
            $table->string('download_pin');
            $table->boolean('is_download_album');
            $table->uuid('download_resolution_id');
            $table->boolean('is_single_photo_download');
            $table->uuid('single_photo_download_resolution_id');
            $table->boolean('is_single_photo_download_require_pin');
            $table->boolean('is_email_download_restrict');
            $table->integer('download_restriction_limit');


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
        Schema::dropIfExists('albums');
    }
}
