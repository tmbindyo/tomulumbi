<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->text('customer_notes')->nullable();
            $table->longText('terms_and_conditions')->nullable();
            $table->date('date');
            $table->date('due_date');

            $table->double('subtotal', 20,2);
            $table->double('discount', 20,2);
            $table->double('tax', 20,2);
            $table->double('total', 20,2);
            $table->double('paid', 20,2);
            $table->double('balance', 20,2);

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('organization_id')->nullable();
            $table->uuid('contact_id')->nullable();
            $table->boolean('is_deal');
            $table->uuid('deal_id')->nullable();

            $table->boolean('has_uploads');
            $table->boolean('is_draft');
            $table->boolean('is_accepted');
            $table->boolean('is_rejected');
            $table->boolean('is_cancelled');

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
        Schema::dropIfExists('quotes');
    }
}
