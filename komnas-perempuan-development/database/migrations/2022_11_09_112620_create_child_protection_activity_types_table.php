<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildProtectionActivityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_protection_activity_types', function (Blueprint $table) {
            $table->id();

            $table->string('name');

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
        Schema::dropIfExists('child_protection_activity_types');
    }
}
