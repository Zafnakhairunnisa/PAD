<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahIbadahRamahAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumah_ibadah_ramah_anaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('alamat');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');
            $table->enum('ruang_bermain', ['ada', 'tidak_ada']);
            $table->enum('pojok_bacaan', ['ada', 'tidak_ada']);
            $table->enum('kawasan_tanpa_rokok', ['ada', 'tidak_ada']);
            $table->enum('layanan_ramah_anak', ['ada', 'tidak_ada']);
            $table->enum('kegiatan_kreatif', ['ada', 'tidak_ada']);

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
        Schema::dropIfExists('rumah_ibadah_ramah_anaks');
    }
}
