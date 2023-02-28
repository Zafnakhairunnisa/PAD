<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanRecapitulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan_recapitulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('kelurahan_recapitulation_categories')
                ->nullOnDelete();
            $table->string('year', 5);
            $table->string('value')->default(0);

            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('SET NULL');
            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('SET NULL');
            $table->foreignId('deleted_by')
                ->nullable()
                ->constrained('users')
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
        Schema::dropIfExists('kelurahan_recapitulations');
    }
}
