<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->double('price',10,2);

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('product_id');
            $table->uuid('sub_type_id');
            $table->uuid('size_id');

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
        Schema::dropIfExists('price_lists');
    }
}
