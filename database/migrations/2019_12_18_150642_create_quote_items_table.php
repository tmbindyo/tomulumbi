<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_items', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('product');
            $table->double('rate', 20,2);
            $table->double('quantity', 20,2);
            $table->double('amount', 20,2);
            $table->double('refund_amount', 20,2)->nullable();

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
        Schema::dropIfExists('quote_items');
    }
}
