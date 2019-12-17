<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->longText('notes')->nullable();

            $table->decimal('amount',20,2);
            $table->decimal('initial_amount',20,2)->nullable();
            $table->decimal('subsequent_amount',20,2)->nullable();

            $table->date('date');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('account_id')->nullable();
            $table->uuid('source_account_id')->nullable();
            $table->uuid('destination_account_id')->nullable();
            $table->uuid('expense_id')->nullable();

            $table->boolean('is_expense');
            $table->boolean('is_transfer');
            $table->boolean('is_billed')->nullable();

            // to track if payment is loan
            $table->boolean('is_loan')->nullable();
            $table->boolean('is_paid')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
