<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('email_id');
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
        Schema::dropIfExists('email_contacts');
    }
}
