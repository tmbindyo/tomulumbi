<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->double('rate', 20,2);
            $table->double('quantity', 20,2);
            $table->double('refund_amount', 20,2)->nullable();

            $table->uuid('status_id');
            $table->uuid('order_id');
            $table->uuid('product_id');
            $table->uuid('price_list_id');

            $table->boolean('is_returned');
            $table->boolean('is_refunded');
            $table->boolean('is_paid');

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
        Schema::dropIfExists('order_products');
    }
}
