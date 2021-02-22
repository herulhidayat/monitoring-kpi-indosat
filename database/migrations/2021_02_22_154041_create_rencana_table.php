<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('cso_id')->nullable();
            $table->string('judul')->nullable();
            $table->text('isi')->nullable();
            $table->date('rencana_start')->nullable();
            $table->date('rencana_end')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('rencana');
    }
}
