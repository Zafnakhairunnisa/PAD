<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePusatKreatifitasAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pusat_kreatifitas_anaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bidang');
            $table->string('alamat');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->string('legalitas');
            $table->string('papan_nama');
            $table->string('pelatihan_kha');
            $table->string('kegiatan');
            $table->string('prestasi');

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
        Schema::dropIfExists('pusat_kreatifitas_anaks');
    }
}
