<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->longText('description');

            $table->date('start_date');
            $table->date('end_date');

            $table->string('expected_revenue');
            $table->string('budgeted_cost');
            $table->longText('actual_cost');

            $table->longText('expected_response');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('campaign_type_id');

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
        Schema::dropIfExists('campaigns');
    }
}
