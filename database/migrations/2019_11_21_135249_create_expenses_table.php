<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->string('notes');

            $table->double('amount',20,2);

            $table->date('start_repeat');
            $table->date('end_repeat');

            $table->uuid('expense_type_id');

            // paid_through_account
            $table->uuid('account_id');
            $table->uuid('vendor_id')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->uuid('order_id')->nullable();

            $table->boolean('is_bill');
            $table->boolean('is_charge_to_client');

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
        Schema::dropIfExists('expenses');
    }
}
