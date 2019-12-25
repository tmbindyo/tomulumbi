<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');

            $table->string('name');
            $table->double('amount',200,2);
            $table->date('starting_date');
            $table->date('closing_date');
            $table->integer('probability');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('organization_id');
            $table->uuid('contact_id')->nullable();
            $table->uuid('lead_source_id')->nullable();
            $table->uuid('deal_stage_id');
            $table->uuid('campaign_id')->nullable();

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
        Schema::dropIfExists('deals');
    }
}
