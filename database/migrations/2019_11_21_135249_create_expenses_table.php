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
            $table->longText('notes');

            $table->double('sub_total',20,2);
            $table->double('adjustment',20,2);
            $table->double('total',20,2);
            $table->double('paid',20,2);

            $table->date('date');
            $table->date('start_repeat')->nullable();
            $table->date('end_repeat')->nullable();

            // paid_through_account
            $table->uuid('expense_type_id');
            $table->uuid('order_id')->nullable();
            $table->uuid('album_id')->nullable();
            $table->uuid('project_id')->nullable();
            $table->uuid('design_id')->nullable();
            $table->uuid('transaction_id')->nullable();
            $table->uuid('frequency_id')->nullable();

            $table->boolean('is_order')->nullable();
            $table->boolean('is_album')->nullable();
            $table->boolean('is_project')->nullable();
            $table->boolean('is_design')->nullable();
            $table->boolean('is_transaction')->nullable();

            $table->boolean('is_draft');
            $table->boolean('is_recurring');

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
        Schema::dropIfExists('expenses');
    }
}
