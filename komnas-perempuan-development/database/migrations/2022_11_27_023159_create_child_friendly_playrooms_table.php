<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildFriendlyPlayroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_friendly_playrooms', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');
            $table->enum('sertifikasi', ['yes', 'no']);
            $table->enum('jenis', ['dalam_ruang', 'luar_ruang']);
            $table->string('fasilitas');

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
        Schema::dropIfExists('child_friendly_playrooms');
    }
}
