<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->date('date');
            $table->integer('views');
            $table->string('color');
            $table->text('description')->nullable();
            $table->longText('body')->nullable();
            $table->integer('series_number')->nullable();

            $table->uuid('cover_image_id')->nullable();
            $table->uuid('thumbnail_size_id')->nullable();
            $table->uuid('typography_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

            $table->boolean('is_journal_series');
            $table->uuid('journal_series_id')->nullable();
            $table->boolean('is_project');
            $table->uuid('project_id')->nullable();
            $table->boolean('is_album');
            $table->uuid('album_id')->nullable();
            $table->boolean('is_design');
            $table->uuid('design_id')->nullable();

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
        Schema::dropIfExists('journals');
    }
}
