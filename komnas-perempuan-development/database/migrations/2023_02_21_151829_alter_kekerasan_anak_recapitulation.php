<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterKekerasanAnakRecapitulation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kekerasan_terhadap_anak_recapitulations', function (Blueprint $table) {
            $table->string('gender', 5)->after('year')->nullable(); // L, P
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kekerasan_terhadap_anak_recapitulations', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
}
