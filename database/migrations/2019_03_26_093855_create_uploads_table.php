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

            // exif data
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
            $table->string('size');

            // image information
            $table->string('file_type');
            $table->string('name');
            $table->string('extension');
            $table->string('orientation')->nullable();

            // images
            $table->text('pixels100')->nullable();
            $table->text('pixels300')->nullable();
            $table->text('pixels500')->nullable();
            $table->text('pixels750')->nullable();
            $table->text('pixels1000')->nullable();
            $table->text('pixels1500')->nullable();
            $table->text('pixels2500')->nullable();
            $table->text('pixels3600')->nullable();
            $table->text('original')->nullable();

            // Cover images
            $table->text('small_thumbnail')->nullable();
            $table->text('large_thumbnail')->nullable();
            $table->text('banner')->nullable();

            $table->boolean('is_album_set_image');
            $table->boolean('is_restrict_to_specific_email')->nullable();

            $table->uuid('tag_id')->nullable();
            $table->uuid('album_id')->nullable();
            $table->uuid('album_set_id')->nullable();
            $table->uuid('design_id')->nullable();
            $table->uuid('design_work_id')->nullable();
            $table->uuid('project_id')->nullable();
            $table->uuid('journal_id')->nullable();
            $table->uuid('product_id')->nullable();
            $table->uuid('campaign_id')->nullable();
            $table->uuid('quote_id')->nullable();
            $table->uuid('tudeme_id')->nullable();
            $table->uuid('letter_id')->nullable();

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
