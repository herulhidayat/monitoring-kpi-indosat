<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi', function (Blueprint $table) {
            $table->id();
            $table->string('total_outlet');
            $table->string('not_order');
            $table->string('msa_target');
            $table->string('msa_ach');
            $table->string('msa_gap');
            $table->string('msa_percen');
            $table->string('msa_nilai');
            $table->string('omb_target');
            $table->string('omb_ach');
            $table->string('omb_gap');
            $table->string('omb_percen');
            $table->string('omb_nilai');
            $table->string('qsso_target');
            $table->string('qsso_ach');
            $table->string('qsso_gap');
            $table->string('qsso_percen');
            $table->string('qsso_nilai');
            $table->string('quro_target');
            $table->string('quro_ach');
            $table->string('quro_gap');
            $table->string('quro_percen');
            $table->string('quro_nilai');
            $table->string('rguga_target');
            $table->string('rguga_ach');
            $table->string('rguga_gap');
            $table->string('rguga_percen');
            $table->string('rguga_nilai');
            $table->string('ssohvc_target');
            $table->string('ssohvc_ach');
            $table->string('ssohvc_gap');
            $table->string('ssohvc_percen');
            $table->string('ssohvc_nilai');
            $table->string('nom_target');
            $table->string('nom_ach');
            $table->string('nom_gap');
            $table->string('nom_percen');
            $table->string('nom_nilai');
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
        Schema::dropIfExists('kpi');
    }
}
