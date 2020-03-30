<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('cookie')->nullable();
            $table->string('email');

            $table->string('order_number');
            $table->text('customer_notes');
            $table->date('expiry_date');
            $table->date('due_date');

            $table->double('discount', 20,2);
            $table->double('subtotal', 20,2);
            $table->double('total', 20,2);
            $table->double('refund', 20,2);
            $table->double('paid',200,2)->nullable();

            $table->uuid('status_id');
            $table->uuid('contact_id');

            $table->boolean('is_returned');
            $table->boolean('is_refunded');
            $table->boolean('is_delivery');
            $table->boolean('is_paid');
            $table->boolean('is_client');
            $table->boolean('is_draft');

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
        Schema::dropIfExists('orders');
    }
}
