<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('category', 50); // jumlah anak, persentase jumlah anak, kepemilikan akta kelahiran, persentase kepemilikan akta kelahiran
            $table->string('year', 5);
            $table->string('gender', 5); // L, P
            $table->string('value')->default(0);
            $table->foreignId('location_id')
                ->nullable()
                ->constrained()
                ->onDelete('SET NULL');

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
        Schema::dropIfExists('akta_kelahirans');
    }
}
