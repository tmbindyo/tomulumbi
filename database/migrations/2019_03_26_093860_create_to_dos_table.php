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

            $table->date('start_date');
            $table->integer('start_year');
            $table->integer('start_month');
            $table->integer('start_day');
            $table->time('start_time');
            $table->integer('start_hour');
            $table->integer('start_minute');

            $table->boolean('is_end_date');
            $table->date('end_date')->nullable();
            $table->integer('end_year')->nullable();
            $table->integer('end_month')->nullable();
            $table->integer('end_day')->nullable();

            $table->boolean('is_end_time');
            $table->time('end_time')->nullable();
            $table->integer('end_hour')->nullable();
            $table->integer('end_minute')->nullable();

            $table->boolean('is_completed');
            $table->date('date_completed')->nullable();

            $table->boolean('is_album');
            $table->uuid('album_id')->nullable();
            $table->boolean('is_design');
            $table->uuid('design_id')->nullable();
            $table->boolean('is_journal');
            $table->uuid('journal_id')->nullable();
            $table->boolean('is_journal_series');
            $table->uuid('journal_series_id')->nullable();
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
            $table->boolean('is_asset');
            $table->uuid('asset_id')->nullable();
            $table->boolean('is_kit');
            $table->uuid('kit_id')->nullable();
            $table->boolean('is_asset_action');
            $table->uuid('asset_action_id')->nullable();
            $table->boolean('is_tudeme');
            $table->uuid('tudeme_id')->nullable();

            $table->boolean('is_event');

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
