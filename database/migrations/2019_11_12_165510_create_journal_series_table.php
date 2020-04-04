<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_series', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->longText('description');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

            $table->boolean('is_journal_series');
            $table->uuid('journal_series_id')->nullable();
            $table->boolean('is_tudeme');
            $table->uuid('tudeme_id')->nullable();

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
        Schema::dropIfExists('journal_series');
    }
}
