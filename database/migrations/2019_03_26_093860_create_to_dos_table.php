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

            $table->boolean('is_completed');

            $table->boolean('is_album');
            $table->uuid('album_id')->nullable();
            $table->boolean('is_design');
            $table->uuid('design_id')->nullable();
            $table->boolean('is_journal');
            $table->uuid('journal_series_id')->nullable();
            $table->boolean('is_journal_series');
            $table->uuid('journal_id')->nullable();
            $table->boolean('is_project');
            $table->uuid('project_id')->nullable();
            $table->boolean('is_product');
            $table->uuid('product_id')->nullable();
            $table->boolean('is_order');
            $table->uuid('order_id')->nullable();
            $table->boolean('is_email');
            $table->uuid('email_id')->nullable();
            $table->boolean('is_contact');
            $table->uuid('contact_id')->nullable();
            $table->boolean('is_organization');
            $table->uuid('organization_id')->nullable();
            $table->boolean('is_deal');
            $table->uuid('deal_id')->nullable();
            $table->boolean('is_campaign');
            $table->uuid('campaign_id')->nullable();

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
