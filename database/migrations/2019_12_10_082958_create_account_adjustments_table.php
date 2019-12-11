<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_adjustments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->longText('notes')->nullable();

            $table->decimal('amount',20,2);
            $table->decimal('initial_account_amount',20,2);
            $table->decimal('subsequent_account_amount',20,2);

            $table->date('date');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('account_id')->nullable();

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
        Schema::dropIfExists('account_adjustments');
    }
}
