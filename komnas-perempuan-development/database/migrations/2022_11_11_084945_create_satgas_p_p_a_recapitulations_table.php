<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatgasPPARecapitulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satgas_p_p_a_recapitulations', function (Blueprint $table) {
            $table->id();

            $table->string('value_diy', 50)->default(0);
            $table->string('value_kabupaten', 50)->default(0);
            $table->string('value_kapanewon', 50)->default(0);
            $table->string('value_kalurahan', 50)->default(0);
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
        Schema::dropIfExists('satgas_p_p_a_recapitulations');
    }
}
