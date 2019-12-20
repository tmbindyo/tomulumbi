<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('mobile_number');
            $table->string('website');
            $table->longText('about');

            // address
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('organization_id');
            $table->uuid('title_id');
            $table->uuid('lead_source_id');
            $table->uuid('industry_id');
            $table->uuid('campaign_id')->nullable();
            $table->uuid('contact_type_id');

            $table->boolean('is_lead');

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
        Schema::dropIfExists('contacts');
    }
}
