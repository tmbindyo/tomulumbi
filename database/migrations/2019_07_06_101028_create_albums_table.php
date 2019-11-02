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
            $table->string('location')->nullable();
            $table->integer('views');
            $table->date('date');
            $table->boolean('is_auto_expiry');
            $table->date('expiry_date')->nullable();
            $table->uuid('album_type_id');
            $table->uuid('cover_image_id')->nullable();

            // Design
            $table->uuid('cover_design_id')->nullable();
            $table->uuid('scheme_id')->nullable();
            $table->uuid('color_id')->nullable();
            $table->uuid('orientation_id')->nullable();
            $table->uuid('content_align_id')->nullable();
            $table->uuid('image_position_id')->nullable();

            $table->uuid('typography_id')->nullable();
            $table->uuid('thumbnail_size_id')->nullable();

            // Privacy
            $table->string('password')->nullable();
            $table->boolean('is_homepage_visible')->nullable();
            $table->boolean('is_client_exclusive_access')->nullable();
            $table->string('client_access_password')->nullable();
            $table->boolean('is_client_make_private')->nullable();

            // Download
            $table->boolean('is_download')->nullable();
            $table->boolean('is_download_pin')->nullable();
            $table->string('download_pin')->nullable();
            $table->boolean('is_download_album')->nullable();
            $table->uuid('download_resolution_id')->nullable();
            $table->boolean('is_single_photo_download')->nullable();
            $table->uuid('single_photo_download_resolution_id')->nullable();
            $table->boolean('is_single_photo_download_require_pin')->nullable();
            $table->boolean('is_email_download_restrict')->nullable();
            $table->integer('download_restriction_limit')->nullable();

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
