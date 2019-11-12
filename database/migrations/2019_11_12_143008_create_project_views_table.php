<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_views', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->boolean('is_project')->nullable();
            $table->boolean('is_project_gallery')->nullable();

            $table->uuid('project_id')->nullable();
            $table->uuid('project_gallery_id')->nullable();

            $table->longText('request')->nullable();
            $table->integer('number');

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
        Schema::dropIfExists('project_views');
    }
}