<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_actions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('reference');
            $table->longText('notes')->nullable();
            $table->double('amount',200,2);

            $table->date('date');
            $table->date('due_date');

            $table->integer('user_id')->unsigned();
            $table->uuid('status_id');
            $table->uuid('asset_id')->nullable();
            $table->uuid('action_type_id')->nullable();

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
        Schema::dropIfExists('asset_actions');
    }
}
