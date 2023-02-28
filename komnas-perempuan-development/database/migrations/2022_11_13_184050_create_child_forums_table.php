<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_forums', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('tingkat', 50);
            $table->string('surat_keputusan');
            $table->string('waktu_pembentukan');
            $table->string('nama_ketua');
            $table->string('nomor_telepon');
            $table->string('alamat');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->string('kabupaten');
            $table->string('media_sosial');
            $table->string('pelatihan_kha', 10);
            $table->string('partisipasi_musrenbang', 10);
            $table->string('kegiatan');
            $table->string('prestasi');

            $table->string('slug');

            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('child_forums');
    }
}
