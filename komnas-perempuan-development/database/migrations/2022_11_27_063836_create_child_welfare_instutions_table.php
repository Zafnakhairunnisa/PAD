<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildWelfareInstutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_welfare_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('nama');
            $table->foreignId('jenis_id')
                ->nullable()
                ->constrained('child_welfare_institution_categories')
                ->nullOnDelete();
            $table->string('tahun_berdiri');
            $table->string('legalitas');
            $table->string('akreditasi');
            $table->string('dusun');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');
            $table->string('media_sosial');
            $table->string('nama_pimpinan');
            $table->string('no_telepon');
            $table->string('jumlah_anak_asuh');
            $table->string('fasilitas');
            $table->string('kegiatan');

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
        Schema::dropIfExists('child_welfare_institutions');
    }
}
