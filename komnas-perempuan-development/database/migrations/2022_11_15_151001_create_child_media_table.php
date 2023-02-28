<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_media', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('jenis_media_id')->unsigned()->nullable();
            $table->foreign('jenis_media_id')
                ->references('id')
                ->on('media_types')
                ->onDelete('SET NULL');
            $table->text('alamat');
            $table->string('kalurahan');
            $table->string('kapanewon');
            $table->string('kabupaten');
            $table->string('media_sosial');
            $table->string('nomor_telepon');
            $table->string('nama_pimpinan');
            $table->string('nama_acara');

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
        Schema::dropIfExists('child_media');
    }
}
