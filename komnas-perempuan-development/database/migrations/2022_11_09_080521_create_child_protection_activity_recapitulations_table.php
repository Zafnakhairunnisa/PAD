<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildProtectionActivityRecapitulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_protection_activity_recapitulations', function (Blueprint $table) {
            $table->id();

            $table->string('company_count', 10);
            $table->string('source_of_fund_apbd', 50)->default(0)->nullable();
            $table->string('source_of_fund_csr', 50)->default(0)->nullable();
            $table->string('budget_amount', 50)->default(0);
            $table->string('year', 5);

            $table->foreignId('location_id')->nullable()->constrained()->onDelete('SET NULL');

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
        Schema::dropIfExists('child_protection_activity_recapitulations');
    }
}
