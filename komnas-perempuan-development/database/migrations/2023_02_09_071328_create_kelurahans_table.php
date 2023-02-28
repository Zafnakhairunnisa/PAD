<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->id();
            $table->string('kalurahan_kelurahan');
            $table->string('kapanewon');
            $table->string('kabupaten');
            $table->string('tahun');
            $table->string('ketua_gugus');
            $table->string('no_gugus');
            $table->string('profil_anak');
            $table->string('forum_anak');
            $table->string('ruang_bermain');
            $table->string('pusat_informasi');
            $table->string('pusat_kreatifitas');
            $table->string('satgas_ppa');
            $table->string('patbm');
            $table->string('pikr');
            $table->string('kawasan_tanpa_rokok');

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
        Schema::dropIfExists('kelurahan');
    }
}
