<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatbmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patbms', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tahun');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kapanewon');
            $table->string('kabupaten');
            $table->string('medsos');
            $table->string('ketua');
            $table->string('no_telp');
            $table->string('fasilitas');
            $table->string('kegiatan');
            $table->string('prestasi');

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
        Schema::dropIfExists('patbms');
    }
}
