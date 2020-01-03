A<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->string('name');
            $table->longText('notes')->nullable();

            $table->date('date_acquired');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('asset_category_id');

            $table->boolean('is_insured');

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
        Schema::dropIfExists('assets');
    }
}
