<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('artist')->nullable();
            $table->string('aperture_f_number')->nullable();
            $table->string('copyright')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('date_time')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_size')->nullable();
            $table->string('iso')->nullable();
            $table->string('focal_length')->nullable();
            $table->string('light_source')->nullable();
            $table->string('max_aperture_value')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('software')->nullable();
            $table->string('shutter_speed')->nullable();

            $table->string('name');
            $table->string('extension');
            $table->string('size');
            $table->text('image');

            // Album set images
            $table->text('pixels100')->nullable();
            $table->text('pixels300')->nullable();
            $table->text('pixels500')->nullable();
            $table->text('pixels750')->nullable();
            $table->text('pixels1000')->nullable();
            $table->text('pixels1500')->nullable();
            $table->text('pixels2500')->nullable();
            $table->text('pixels3600')->nullable();

            $table->uuid('album_set_id')->nullable();
            $table->boolean('is_client_exclusive_access')->nullable();
            $table->boolean('is_album_set_image');

            // Album cover image
            $table->text('small_thumbnail')->nullable();
            $table->text('large_thumbnail')->nullable();
            $table->text('banner')->nullable();
            $table->text('original')->nullable();

            $table->uuid('album_id')->nullable();
            $table->uuid('design_id')->nullable();
            $table->uuid('design_work_id')->nullable();
            $table->uuid('tag_id')->nullable();
            $table->uuid('upload_type_id');
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
        Schema::dropIfExists('uploads');
    }
}
