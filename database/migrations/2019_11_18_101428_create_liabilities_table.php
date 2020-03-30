<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liabilities', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->longText('about');

            $table->decimal('total',20,2);
            $table->decimal('principal',20,2);
            $table->decimal('interest',20,8)->nullable();
            $table->decimal('interest_amount',20,8)->nullable();
            $table->decimal('paid',20,2)->nullable();
            $table->decimal('balance',20,2)->nullable();

            $table->date('date');
            $table->date('due_date');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('contact_id')->nullable();
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
        Schema::dropIfExists('liabilities');
    }
}
