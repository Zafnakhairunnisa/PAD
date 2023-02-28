<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('surat_keterangan');
            $table->string('year', 5);
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('medical_facility_categories')
                ->onDelete('SET NULL');
            $table->string('alamat');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');
            $table->string('provinsi');
            $table->string('sdm_terlatih');
            $table->enum('pusat_informasi', ['ada', 'belum_ada']);
            $table->enum('ruang_pelayanan', ['ada', 'belum_ada']);
            $table->enum('ruang_bermain_ramah_anak', ['ada', 'belum_ada']);
            $table->enum('ruang_laktasi', ['ada', 'belum_ada']);
            $table->enum('kawasan_tanpa_rokok', ['ada', 'belum_ada']);
            $table->enum('sanitasi_sesuai_standar', ['sesuai', 'belum_sesuai']);
            $table->enum('sarpras_ramah_disabilitas', ['ada', 'belum_ada']);
            $table->string('cakupan_bayi');
            $table->enum('pelayanan_konseling', ['ada', 'belum_ada']);
            $table->enum('tata_laksana', ['ada', 'belum_ada']);
            $table->enum('jumlah_anak', ['ada', 'belum_ada']);
            $table->enum('informasi_hak_anak', ['ada', 'belum_ada']);
            $table->enum('mekanisme_suara_anak', ['ada', 'belum_ada']);
            $table->string('pelayanan_penjangkauan');
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
        Schema::dropIfExists('medical_facilities');
    }
}
