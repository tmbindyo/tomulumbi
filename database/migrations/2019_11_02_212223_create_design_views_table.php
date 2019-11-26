<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_views', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->boolean('is_design')->nullable();
            $table->boolean('is_design_work')->nullable();
            $table->boolean('is_design_gallery')->nullable();

            $table->uuid('design_id')->nullable();
            $table->uuid('design_work_id')->nullable();
            $table->uuid('design_gallery_id')->nullable();

            $table->longText('request')->nullable();
            $table->integer('number');
            $table->string('cookie');

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
        Schema::dropIfExists('design_views');
    }
}
