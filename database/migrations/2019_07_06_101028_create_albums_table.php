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
            $table->date('expiry_date');
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
            $table->boolean('is_album_set_exclusive')->nullable();

            // Download
            $table->boolean('is_download')->nullable();
            $table->string('download_pin')->nullable();
            $table->integer('download_restriction_limit')->nullable();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

            $table->boolean('is_deal');
            $table->uuid('deal_id')->nullable();
            $table->boolean('is_project');
            $table->uuid('project_id')->nullable();
            $table->boolean('is_design');
            $table->uuid('design_id')->nullable();
            $table->boolean('is_tudeme');
            $table->uuid('tudeme_id')->nullable();

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
