<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('design_id');
            $table->uuid('contact_id');

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
        Schema::dropIfExists('design_contacts');
    }
}
