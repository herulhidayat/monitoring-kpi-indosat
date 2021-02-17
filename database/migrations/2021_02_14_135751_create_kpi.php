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
            $table->string('username')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('micro_cluster')->nullable();
            $table->string('total_outlet')->nullable();
            $table->string('not_order')->nullable();
            $table->string('msa_target')->nullable();
            $table->string('msa_ach')->nullable();
            $table->string('msa_gap')->nullable();
            $table->string('msa_percen')->nullable();
            $table->string('msa_nilai')->nullable();
            $table->string('omb_target')->nullable();
            $table->string('omb_ach')->nullable();
            $table->string('omb_gap')->nullable();
            $table->string('omb_percen')->nullable();
            $table->string('omb_nilai')->nullable();
            $table->string('qsso_target')->nullable();
            $table->string('qsso_ach')->nullable();
            $table->string('qsso_gap')->nullable();
            $table->string('qsso_percen')->nullable();
            $table->string('qsso_nilai')->nullable();
            $table->string('quro_target')->nullable();
            $table->string('quro_ach')->nullable();
            $table->string('quro_gap')->nullable();
            $table->string('quro_percen')->nullable();
            $table->string('quro_nilai')->nullable();
            $table->string('sc_target')->nullable();
            $table->string('sc_ach')->nullable();
            $table->string('sc_gap')->nullable();
            $table->string('sc_percen')->nullable();
            $table->string('sc_nilai')->nullable();
            $table->string('ssohvc_target')->nullable();
            $table->string('ssohvc_ach')->nullable();
            $table->string('ssohvc_gap')->nullable();
            $table->string('ssohvc_percen')->nullable();
            $table->string('ssohvc_nilai')->nullable();
            $table->string('sqsso_target')->nullable();
            $table->string('sqsso_ach')->nullable();
            $table->string('sqsso_gap')->nullable();
            $table->string('sqsso_percen')->nullable();
            $table->string('sqsso_nilai')->nullable();
            $table->string('ssc_target')->nullable();
            $table->string('ssc_ach')->nullable();
            $table->string('ssc_gap')->nullable();
            $table->string('ssc_percen')->nullable();
            $table->string('ssc_nilai')->nullable();
            $table->string('score')->nullable();
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
