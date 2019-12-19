<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->date('date');
            $table->integer('views');
            $table->integer('gallery_views');
            $table->text('description')->nullable();

            $table->uuid('cover_image_id')->nullable();
            $table->uuid('typography_id')->nullable();
            $table->text('contact_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

            $table->boolean('is_project');
            $table->uuid('project_id');
            $table->boolean('is_deal');
            $table->uuid('deal_id');

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
        Schema::dropIfExists('designs');
    }
}
