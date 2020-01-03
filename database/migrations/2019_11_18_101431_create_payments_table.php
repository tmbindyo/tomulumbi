<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // debit, holds transactions that have gained me money
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->longText('notes')->nullable();

            $table->date('date');

            $table->double('initial_balance', 20, 2)->nullable();
            $table->double('paid', 20, 2)->nullable();
            $table->double('current_balance', 20, 2)->nullable();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('account_id');

            $table->boolean('is_order');
            $table->uuid('order_id');
            $table->boolean('is_album');
            $table->uuid('album_id');
            $table->boolean('is_design');
            $table->uuid('design_id');
            $table->boolean('is_project');
            $table->uuid('project_id');
            $table->boolean('is_asset_action');
            $table->uuid('asset_action_id');
            $table->boolean('is_loan');
            $table->uuid('loan_id');

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
        Schema::dropIfExists('payments');
    }
}
