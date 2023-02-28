<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyConsultanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_consultancies', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->foreignId('kategori_id')
                ->nullable()
                ->constrained('family_consultancy_categories')
                ->nullOnDelete();
            $table->string('alamat');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');
            $table->string('media_sosial');
            $table->string('nama_pimpinan');
            $table->string('no_telepon');
            $table->string('no_sertifikasi');
            $table->string('kegiatan');
            $table->string('klien', 50);
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
        Schema::dropIfExists('family_consultancies');
    }
}
