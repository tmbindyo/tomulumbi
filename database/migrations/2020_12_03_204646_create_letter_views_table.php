<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_views', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->longText('request')->nullable();
            $table->integer('number');
            $table->string('cookie')->nullable();

            $table->uuid('letter_id')->nullable();
            $table->uuid('letter_gallery_id')->nullable();

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
        Schema::dropIfExists('letter_views');
    }
}
