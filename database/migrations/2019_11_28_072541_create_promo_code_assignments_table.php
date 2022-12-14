<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodeAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_assignments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->integer('assigned');

            $table->date('expiry_date');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('promo_code_id');
            $table->uuid('contact_id');

            $table->boolean('is_used');

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
        Schema::dropIfExists('promo_code_assignments');
    }
}
