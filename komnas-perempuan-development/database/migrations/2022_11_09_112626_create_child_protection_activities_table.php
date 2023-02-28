<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildProtectionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_protection_activities', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->bigInteger('source_of_fund_id')->unsigned()->nullable();
            $table->bigInteger('activity_type_id')->unsigned()->nullable();
            $table->string('activity_name');
            $table->string('target');
            $table->string('budget');
            $table->string('year', 5);

            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');

            $table->foreign('source_of_fund_id', 'fk_fund_child_protection_activity')
                ->references('id')
                ->on('child_protection_activity_source_of_funds')
                ->onDelete('SET NULL');

            $table->foreign('activity_type_id', 'fk_type_child_protection_activity')
                ->references('id')
                ->on('child_protection_activity_types')
                ->onDelete('SET NULL');

            $table->string('slug');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_protection_activities');
    }
}
