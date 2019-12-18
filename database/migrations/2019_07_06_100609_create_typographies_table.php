<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typographies', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->string('font_family');
            $table->text('url');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');

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
        Schema::dropIfExists('typographies');
    }
}
