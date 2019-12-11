<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->integer('limit');
            $table->string('reference');
            $table->text('terms_and_conditions');
            $table->date('expiry_date');

            $table->double('discount', 20,2);

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

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
        Schema::dropIfExists('promo_codes');
    }
}
