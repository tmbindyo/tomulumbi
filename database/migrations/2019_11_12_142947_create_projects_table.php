<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->date('date');
            $table->integer('views');
            $table->text('description')->nullable();

            $table->uuid('thumbnail_size_id')->nullable();
            $table->uuid('cover_image_id')->nullable();
            $table->uuid('typography_id')->nullable();
            $table->text('client_id')->nullable();
            // todo yet to figure out
//            $table->text('partner_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
