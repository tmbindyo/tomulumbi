<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_dos', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name');
            $table->text('notes');
            $table->date('due_date');
            $table->date('date_completed')->nullable();

            $table->boolean('is_album');
            $table->boolean('is_design');
            $table->boolean('is_journal');
            $table->boolean('is_project');
            $table->boolean('is_product');
            $table->boolean('is_email');

            $table->uuid('album_id')->nullable();
            $table->uuid('design_id')->nullable();
            $table->uuid('journal_id')->nullable();
            $table->uuid('project_id')->nullable();
            $table->uuid('product_id')->nullable();
            $table->uuid('email_id')->nullable();
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
        Schema::dropIfExists('to_dos');
    }
}
