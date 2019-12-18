<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('phone_number');
            $table->string('website');
            $table->string('reference');
            $table->string('email');

            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('code');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('organization_type_id');
            $table->uuid('parent_account_id');
            $table->uuid('parent_organization_id');
            $table->uuid('campaign_id');

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
        Schema::dropIfExists('organizations');
    }
}
