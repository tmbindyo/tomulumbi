<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_views', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->longText('request')->nullable();
            $table->integer('number');
            $table->string('cookie');

            $table->uuid('journal_id')->nullable();
            $table->uuid('journal_gallery_id')->nullable();

            $table->boolean('is_journal')->nullable();
            $table->boolean('is_journal_gallery')->nullable();

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
        Schema::dropIfExists('journal_views');
    }
}
