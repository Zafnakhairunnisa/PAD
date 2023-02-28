<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmunizationRecapitulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immunization_recapitulations', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('year', 5);
            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');
            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');
            $table->foreignId('deleted_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');
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
        Schema::dropIfExists('immunization_recapitulations');
    }
}
