<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpustakaanDanTamanBacaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpustakaan_dan_taman_bacaan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year', 4);
            $table->string('value');

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

        Schema::table('perpustakaan_dan_taman_bacaan', function (Blueprint $table) {
            $table->foreignId('parent_id')
                ->after('year')
                ->nullable()
                ->constrained('perpustakaan_dan_taman_bacaan')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perpustakaan_dan_taman_bacaan', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('perpustakaan_dan_taman_bacaan');
    }
}
