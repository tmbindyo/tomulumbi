<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_views', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->longText('request')->nullable();
            $table->integer('number');
            $table->string('cookie')->nullable();

            $table->uuid('product_id')->nullable();
            $table->uuid('product_gallery_id')->nullable();

            $table->boolean('is_product')->nullable();
            $table->boolean('is_product_gallery')->nullable();

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
        Schema::dropIfExists('product_views');
    }
}
