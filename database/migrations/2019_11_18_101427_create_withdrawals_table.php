<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference', 200);
            $table->longText('about');

            $table->date('date');

            $table->decimal('initial_amount',20,2);
            $table->decimal('amount',20,2);
            $table->decimal('subsequent_amount',20,2);

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('account_id');

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
        Schema::dropIfExists('withdrawals');
    }
}
