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

            $table->boolean('has_items')->nullable();

            $table->boolean('is_order')->nullable();
            $table->uuid('order_id')->nullable();
            $table->boolean('is_album')->nullable();
            $table->uuid('album_id')->nullable();
            $table->boolean('is_project')->nullable();
            $table->uuid('project_id')->nullable();
            $table->boolean('is_design')->nullable();
            $table->uuid('design_id')->nullable();
            $table->boolean('is_liability')->nullable();
            $table->uuid('liability_id')->nullable();
            $table->boolean('is_transfer')->nullable();
            $table->uuid('transfer_id')->nullable();
            $table->boolean('is_campaign')->nullable();
            $table->uuid('campaign_id')->nullable();
            $table->boolean('is_asset')->nullable();
            $table->uuid('asset_id')->nullable();
            $table->boolean('is_expense')->nullable();
            $table->uuid('expense_id')->nullable();

            $table->boolean('is_draft');
            $table->boolean('is_recurring');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('expense_account_id');
            $table->uuid('frequency_id')->nullable();

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
